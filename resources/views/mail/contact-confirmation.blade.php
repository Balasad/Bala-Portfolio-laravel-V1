<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; color: #333; background: #f5f5f5;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 5px;">
        <h2>Thank You for Your Enquiry</h2>
        
        <p>Hi {{ $name }},</p>
        
        <p>Thank you for reaching out! We have received your {{ strtolower($enquiryLabel) }} enquiry and will get back to you as soon as possible.</p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
        
        <p><strong>Enquiry Type:</strong> {{ $enquiryLabel }}</p>
        <p><strong>Received:</strong> {{ now()->format('F d, Y @ g:i A') }}</p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
        
        <p><strong>Your Message:</strong></p>
        <p style="background: #f9f9f9; padding: 15px; border-left: 3px solid #4ade80;">
            {{ $message }}
        </p>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
        
        <p>We typically respond within 24 hours. If you have any urgent matters, feel free to contact us directly at <a href="mailto:balasaravanan062@gmail.com">balasaravanan062@gmail.com</a></p>
        
        <p>Best regards,<br>Balasaravanan S</p>
    </div>
</body>
</html>

