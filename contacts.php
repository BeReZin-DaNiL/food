<?php
require_once 'header.php';
?>

<div class="container">
    <h1>📞 Контакты</h1>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; margin-top: 50px;">
        <!-- Contact Info -->
        <div>
            <h2 style="font-size: 1.5rem; color: var(--secondary); margin-bottom: 30px; font-family: 'Poppins', sans-serif;">Информация</h2>
            
            <div style="background: rgba(255,107,53,0.05); padding: 20px; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid var(--primary);">
                <h3 style="margin-bottom: 8px; color: var(--primary);">📍 Адрес</h3>
                <p style="color: #555;">г. Москва, ул. Пушкина, д. 10</p>
            </div>

            <div style="background: rgba(0,78,137,0.05); padding: 20px; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid var(--secondary);">
                <h3 style="margin-bottom: 8px; color: var(--secondary);">📱 Телефон</h3>
                <p style="color: #555;"><a href="tel:+79991234567" style="color: var(--secondary); text-decoration: none; font-weight: 600;">+7 (999) 123-45-67</a></p>
            </div>

            <div style="background: rgba(247,147,30,0.05); padding: 20px; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid var(--accent);">
                <h3 style="margin-bottom: 8px; color: var(--accent);">✉️ Email</h3>
                <p style="color: #555;"><a href="mailto:info@fooddelivery.ru" style="color: var(--accent); text-decoration: none; font-weight: 600;">info@fooddelivery.ru</a></p>
            </div>

            <div style="background: rgba(76,175,80,0.05); padding: 20px; border-radius: 12px; border-left: 4px solid var(--success);">
                <h3 style="margin-bottom: 8px; color: var(--success);">🕒 Время работы</h3>
                <p style="color: #555;">Пн-Пт: 10:00 - 22:00</p>
                <p style="color: #555;">Сб-Вс: 11:00 - 23:00</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div>
            <h2 style="font-size: 1.5rem; color: var(--secondary); margin-bottom: 30px; font-family: 'Poppins', sans-serif;">Напишите нам</h2>
            
            <form style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 30px; border-radius: 16px; border: 1px solid rgba(255,107,53,0.1); box-shadow: var(--shadow);">
                <div class="form-group">
                    <label for="name">👤 Ваше имя</label>
                    <input type="text" id="name" name="name" placeholder="Иван Петров" required>
                </div>
                
                <div class="form-group">
                    <label for="email">✉️ Email</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.com" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">📱 Телефон</label>
                    <input type="text" id="phone" name="phone" placeholder="+7 (999) 123-45-67">
                </div>
                
                <div class="form-group">
                    <label for="message">💬 Сообщение</label>
                    <textarea id="message" name="message" placeholder="Ваше сообщение..." style="width: 100%; padding: 14px 16px; border: 2px solid var(--border); border-radius: 10px; font-family: 'Inter', sans-serif; font-size: 15px; resize: vertical; min-height: 120px; transition: all 0.3s ease;" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-register" style="width: 100%;">Отправить сообщение</button>
            </form>
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>

</body>
</html>
