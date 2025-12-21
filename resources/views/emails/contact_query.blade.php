<!DOCTYPE html>
<html>
<head>
    <title>New Contact Query</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>New Contact Inquiry Received</h2>
    <p><strong>Name:</strong> {{ $lead->name }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Phone:</strong> {{ $lead->phone }}</p>
    <p><strong>Message:</strong></p>
    <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #f75d34;">
        {{ $lead->message }}
    </div>
</body>
</html>