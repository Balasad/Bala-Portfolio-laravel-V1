<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { margin: 0; padding: 0; background: #0f172a; font-family: 'Roboto', Arial, sans-serif; }
        .container { width: 100%; background: #0f172a; padding: 40px 0; }
        .main { max-width: 560px; margin: 0 auto; background: #1e293b; border-radius: 16px; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); }
        .header { background: linear-gradient(135deg, #22c55e, #4ade80); padding: 28px 32px; }
        .header p { margin: 0; color: rgba(255,255,255,0.8); font-size: 11px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; }
        .header h1 { margin: 8px 0 0; color: #fff; font-size: 22px; font-weight: 800; }
        .content { padding: 32px; }
        .content p { color: #fff; line-height: 1.6; margin: 0 0 20px; }
        .info { border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 24px; }
        .info-row { padding: 10px 0; display: flex; gap: 20px; }
        .info-label { color: #94a3b8; font-size: 13px; width: 130px; }
        .info-value { color: #fff; font-size: 14px; flex: 1; }
        .message-label { color: #94a3b8; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; }
        .message-box { background: rgba(255,255,255,0.04); border-radius: 12px; padding: 20px; color: #e2e8f0; font-size: 15px; line-height: 1.8; white-space: pre-wrap; word-wrap: break-word; }
        .footer { padding: 16px 32px; border-top: 1px solid rgba(255,255,255,0.06); color: #475569; font-size: 11px; }
        .cta { margin-top: 24px; color: #475569; font-size: 13px; line-height: 1.6; }
        .cta a { color: #4ade80; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="header">
                <p>Portfolio Confirmation</p>
                <h1>{{ $enquiryLabel }}</h1>
            </div>
            <div class="content">
                <p>Hi {{ $name }},</p>
                <p>Thank you for reaching out! I've received your enquiry and will get back to you as soon as possible.</p>
                
                <div class="info">
                    <div class="info-row">
                        <div class="info-label">Type</div>
                        <div class="info-value">{{ $enquiryLabel }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Received</div>
                        <div class="info-value">{{ now()->format('M d, Y • g:i A') }}</div>
                    </div>
                </div>

                <div class="message-label">Your Message</div>
                <div class="message-box">{{ $message }}</div>

                <div class="cta">
                    <p>I typically respond within 24 hours. If you don't hear from me, feel free to reach out directly at <a href="mailto:balasaravanan062@gmail.com">balasaravanan062@gmail.com</a></p>
                </div>
            </div>
            <div class="footer">
                <p>Balasaravanan S — Portfolio</p>
            </div>
        </div>
    </div>
</body>
</html>

