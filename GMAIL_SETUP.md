# إعداد Gmail SMTP لـ Laravel

## ⚠️ ملاحظة مهمة جداً:
Gmail **لا يقبل** كلمة المرور العادية. يجب استخدام **App Password** (كلمة مرور التطبيق).

## خطوات إعداد Gmail SMTP:

### 1. تفعيل التحقق بخطوتين (2-Step Verification)
1. اذهب إلى: https://myaccount.google.com/security
2. فعّل "2-Step Verification"

### 2. إنشاء App Password
1. اذهب إلى: https://myaccount.google.com/apppasswords
2. اختر "Select app" → "Mail"
3. اختر "Select device" → "Other (Custom name)" → اكتب "Laravel Landing Page"
4. اضغط "Generate"
5. **انسخ كلمة المرور** (16 حرف بدون مسافات) - مثال: `abcd efgh ijkl mnop`

### 3. إعدادات `.env`
أضف/عدّل هذه الأسطر في ملف `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

CONTACT_EMAIL=info@domain.com
```

**ملاحظات مهمة:**
- `MAIL_USERNAME`: البريد الإلكتروني الكامل (مثال: `user@gmail.com`)
- `MAIL_PASSWORD`: App Password المكونة من 16 حرف (ليس كلمة المرور العادية)
- `MAIL_PORT`: 587 مع `tls` أو 465 مع `ssl`
- `MAIL_ENCRYPTION`: `tls` (للمنفذ 587) أو `ssl` (للمنفذ 465)

### 4. مسح الكاش
بعد تعديل `.env`، امسح كاش الإعدادات:

```bash
php artisan config:clear
php artisan cache:clear
```

### 5. اختبار الإرسال
1. املأ النموذج في الموقع
2. اضغط إرسال
3. تحقق من البريد الوارد في `CONTACT_EMAIL`

## استكشاف الأخطاء:

### إذا ظهر خطأ "Username and Password not accepted":
- ✅ تأكد من استخدام **App Password** وليس كلمة المرور العادية
- ✅ تأكد من نسخ App Password بشكل صحيح (16 حرف بدون مسافات)
- ✅ تأكد من تفعيل 2-Step Verification

### إذا ظهر خطأ "Connection timeout":
- ✅ تحقق من المنفذ (587 أو 465)
- ✅ تحقق من `MAIL_ENCRYPTION` (`tls` أو `ssl`)
- ✅ تأكد من عدم حظر Firewall

### إذا لم يظهر أي خطأ ولكن الرسالة لا تصل:
1. تحقق من سلة المهملات (Spam)
2. تحقق من `storage/logs/laravel.log` للأخطاء
3. جرب استخدام `MAIL_MAILER=log` للاختبار أولاً

## اختبار مع Log (بدون إرسال حقيقي):
للتأكد من أن النموذج يعمل، استخدم:

```env
MAIL_MAILER=log
```

سيتم حفظ الرسائل في `storage/logs/laravel.log` بدلاً من الإرسال الفعلي.

## مثال `.env` كامل لـ Gmail:
```env
APP_NAME="Laravel Landing Page"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=abcdefghijklmnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Laravel Landing Page"

CONTACT_EMAIL=info@domain.com
```

---

**مهم:** إذا كنت تستخدم Gmail Workspace (Google Workspace)، قد تحتاج إلى إعدادات مختلفة. راجع إعدادات SMTP من مسؤول Workspace.

