import logging
import mysql.connector
from mysql.connector import Error
import bcrypt  # For bcrypt password hashing
import matplotlib.pyplot as plt
import io  # For in-memory file handling
from telegram import Update
from telegram.ext import Application, CommandHandler, MessageHandler, filters, ConversationHandler, CallbackContext

# Enable logging
logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s', level=logging.INFO)
logger = logging.getLogger(__name__)

# MySQL connection settings
DB_CONFIG = {
    'host': 'localhost',
    'user': 'root',
    'password': 'Tim8',
    'database': 'fithub'
}

# Telegram bot token
BOT_TOKEN = '8039355973:AAFLsR497p84GWbwwQwk1YdkDaLvCu6wh4k'

# Conversation states
LOGIN, PASSWORD = range(2)

# Database connection
def get_db_connection():
    try:
        conn = mysql.connector.connect(**DB_CONFIG)
        if conn.is_connected():
            return conn
    except Error as e:
        logger.error(f"Error connecting to database: {e}")
    return None

# Start command handler
async def start(update: Update, context: CallbackContext) -> int:
    await update.message.reply_text("Welcome to FitHub Bot! Please enter your username:")
    return LOGIN

# Handle username input
async def handle_username(update: Update, context: CallbackContext) -> int:
    context.user_data['username'] = update.message.text
    await update.message.reply_text("Great! Now enter your password:")
    return PASSWORD

# Handle password input and authenticate
async def handle_password(update: Update, context: CallbackContext) -> int:
    username = context.user_data['username']
    password = update.message.text  # Do not hash the password yet, we'll use bcrypt's verify

    conn = get_db_connection()
    if not conn:
        await update.message.reply_text("Database connection failed. Please try again later.")
        return ConversationHandler.END

    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT * FROM users WHERE username = %s", (username,))
    user = cursor.fetchone()

    if user and bcrypt.checkpw(password.encode('utf-8'), user['password'].encode('utf-8')):  # Compare using bcrypt
        context.user_data['user_id'] = user['id']
        context.user_data['fitness_level'] = user.get('fitness_level', 'Not set')  # Optional field check
        await update.message.reply_text(f"Welcome back, {username}! Use /progress to view your progress or /nutrition for nutrition guidance or /graph to visual representation of progress.")
        conn.close()
        return ConversationHandler.END
    else:
        await update.message.reply_text("Invalid credentials. Start again with /start.")
        conn.close()
        return ConversationHandler.END

async def show_progress(update: Update, context: CallbackContext):
    user_id = context.user_data.get('user_id')
    if not user_id:
        await update.message.reply_text("You need to log in first using /start.")
        return

    conn = get_db_connection()
    if not conn:
        await update.message.reply_text("Database connection failed. Please try again later.")
        return

    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT weight FROM progress WHERE user_id = %s LIMIT 5", (user_id,))
    rows = cursor.fetchall()
    conn.close()

    if rows:
        progress_report = "*📈 Your Recent Progress:*\n\n"
        for index, row in enumerate(rows, start=1):
            progress_report += f"➤ *Session {index}:* _{row['weight']:.2f} kg_\n"
        progress_report += "\nKeep up the good work! 💪"

        await update.message.reply_text(progress_report, parse_mode="Markdown")
    else:
        await update.message.reply_text("No progress records found.")



async def show_nutrition(update: Update, context: CallbackContext):
    user_id = context.user_data.get('user_id')
    if not user_id:
        await update.message.reply_text("You need to log in first using /start.")
        return

    conn = get_db_connection()
    if not conn:
        await update.message.reply_text("Database connection failed. Please try again later.")
        return

    cursor = conn.cursor(dictionary=True)
    cursor.execute("SELECT meal, calories, protein, carbs, fat FROM nutrition_guidance WHERE user_id = %s", (user_id,))
    rows = cursor.fetchall()
    conn.close()

    if rows:
        nutrition_report = "*🍽️ Your Nutrition Guidance:*\n\n"
        total_calories = 0
        for index, row in enumerate(rows, start=1):
            nutrition_report += (
                f"*{index}. {row['meal']}*\n"
                f"  - *Calories:* {row['calories']} kcal\n"
                f"  - *Protein:* {row['protein']} g\n"
                f"  - *Carbs:* {row['carbs']} g\n"
                f"  - *Fat:* {row['fat']} g\n\n"
            )
            total_calories += row['calories']

        nutrition_report += f"*🔥 Total Calories Consumed:* {total_calories} kcal\n"
        nutrition_report += "\nStay on track with your goals! 🌟"

        await update.message.reply_text(nutrition_report, parse_mode="Markdown")
    else:
        await update.message.reply_text("No nutrition guidance records found.")



# Generate and send weight graph
async def send_weight_graph(update: Update, context: CallbackContext):
    user_id = context.user_data.get('user_id')
    if not user_id:
        await update.message.reply_text("You need to log in first using /start.")
        return

    conn = get_db_connection()
    if not conn:
        await update.message.reply_text("Database connection failed. Please try again later.")
        return

    cursor = conn.cursor(dictionary=True)
    # Fetch weight progress data (no date, just weight)
    cursor.execute("SELECT * FROM progress WHERE user_id = %s LIMIT 10", (user_id,))
    rows = cursor.fetchall()
    conn.close()

    if rows:
        # Extract weight data for graphing (no date, so we'll use index)
        weights = [row['weight'] for row in rows]

        # Create a plot using matplotlib
        plt.figure(figsize=(10, 5))
        plt.plot(range(len(weights)), weights, marker='o', color='b', label='Weight')
        plt.title("Your Weight Progress")
        plt.xlabel("Entry Number")
        plt.ylabel("Weight (kg)")
        plt.grid(True)
        plt.tight_layout()

        # Save the plot to a BytesIO object
        image_stream = io.BytesIO()
        plt.savefig(image_stream, format='png')
        image_stream.seek(0)
        plt.close()

        # Send the image as a Telegram message
        await update.message.reply_photo(photo=image_stream, caption="Your Weight Progress Graph")
    else:
        await update.message.reply_text("No progress records found.")

# Main function
def main():
    application = Application.builder().token(BOT_TOKEN).build()

    # Conversation handler for login
    conv_handler = ConversationHandler(
        entry_points=[CommandHandler('start', start)],
        states={
            LOGIN: [MessageHandler(filters.TEXT & ~filters.COMMAND, handle_username)],
            PASSWORD: [MessageHandler(filters.TEXT & ~filters.COMMAND, handle_password)],
        },
        fallbacks=[CommandHandler('start', start)],
    )

    # Add handlers
    application.add_handler(conv_handler)
    application.add_handler(CommandHandler('progress', show_progress))
    application.add_handler(CommandHandler('nutrition', show_nutrition))
    application.add_handler(CommandHandler('graph', send_weight_graph))  # Added graph command handler

    # Start the bot
    application.run_polling()

if __name__ == '__main__':
    main()
