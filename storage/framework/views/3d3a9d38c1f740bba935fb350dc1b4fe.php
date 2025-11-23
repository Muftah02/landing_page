<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رسالة جديدة من صفحة الهبوط</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 10px;">
        رسالة جديدة من صفحة الهبوط
    </h2>
    
    <div style="margin-top: 20px;">
        <p><strong>الاسم:</strong> <?php echo e($name); ?></p>
        <p><strong>البريد الإلكتروني:</strong> <?php echo e($email); ?></p>
    </div>
    
    <div style="margin-top: 20px; padding: 15px; background-color: #f3f4f6; border-radius: 5px;">
        <p><strong>الرسالة:</strong></p>
        <p style="white-space: pre-wrap;"><?php echo e($body); ?></p>
    </div>
    
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 12px; color: #6b7280;">
        <p>تم إرسال هذه الرسالة من صفحة الهبوط - <?php echo e(config('app.name')); ?></p>
    </div>
</body>
</html>

<?php /**PATH C:\Users\HP\Desktop\landing_page\resources\views/emails/contact.blade.php ENDPATH**/ ?>