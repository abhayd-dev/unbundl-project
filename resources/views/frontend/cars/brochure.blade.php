<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $car->name }} Brochure</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #24272c; 
            color: white;
            padding: 20px 40px;
            text-align: right;
        }
        .logo {
            float: left;
            font-size: 24px;
            font-weight: bold;
            color: #f75d34; 
            text-transform: uppercase;
        }
        .container {
            padding: 40px;
        }
        .car-title {
            font-size: 32px;
            font-weight: bold;
            color: #24272c;
            margin-bottom: 5px;
        }
        .car-subtitle {
            font-size: 18px;
            color: #f75d34;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 2px solid #eee;
        }
        .details-box {
            background-color: #f8f9fa;
            border-left: 5px solid #f75d34;
            padding: 20px;
            margin-bottom: 30px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table td {
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }
        .details-table td.label {
            font-weight: bold;
            color: #666;
            width: 40%;
        }
        .details-table td.value {
            font-weight: bold;
            color: #333;
            text-align: right;
        }
        .features-section {
            margin-top: 30px;
        }
        .section-heading {
            font-size: 20px;
            border-bottom: 2px solid #f75d34;
            padding-bottom: 10px;
            margin-bottom: 15px;
            color: #24272c;
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            margin-bottom: 8px;
            font-size: 14px;
        }
        .feature-list li:before {
            content: "•";
            color: #f75d34;
            font-weight: bold;
            display: inline-block; 
            width: 1em;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f75d34;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">UNBUNDL</div>
        <div>Premium Car Brochure</div>
    </div>

    <div class="container">
        <div class="car-title">{{ $car->name }}</div>
        <div class="car-subtitle">{{ $car->price_range }}</div>

        @php
            $imagePath = storage_path('app/public/'.$car->image);
        @endphp
        
        @if(file_exists($imagePath))
            <img src="{{ $imagePath }}" class="hero-image">
        @else
            <div style="height:350px; background:#eee; text-align:center; padding-top:150px;">Image Not Available</div>
        @endif

        <div class="details-box">
            <table class="details-table">
                <tr>
                    <td class="label">Vehicle Type</td>
                    <td class="value">{{ $car->type->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Condition</td>
                    <td class="value">{{ ucfirst($car->condition) }}</td>
                </tr>
                <tr>
                    <td class="label">Price Range</td>
                    <td class="value">{{ $car->price_range }}</td>
                </tr>
                <tr>
                    <td class="label">Availability</td>
                    <td class="value">In Stock</td>
                </tr>
            </table>
        </div>

        <div class="features-section">
            <div class="section-heading">Why Buy This Car?</div>
            <p style="font-size: 14px; line-height: 1.6; color: #555;">
                Experience the perfect blend of style and performance with the {{ $car->name }}. 
                This {{ strtolower($car->type->name ?? 'vehicle') }} offers exceptional value, 
                comfort, and road presence. Ideal for both city driving and long highway journeys.
            </p>
            
            <br>
            
            <div class="section-heading">Key Features</div>
            <ul class="feature-list">
                <li>Premium Interiors & Comfort</li>
                <li>Advanced Safety Features</li>
                <li>High Fuel Efficiency</li>
                <li>Modern Infotainment System</li>
                <li>{{ $car->condition == 'new' ? 'Brand New Condition' : 'Certified Used Car' }}</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        Generated by Unbundl Car Portal | Visit us at www.unbundl.com | Call: +91 98765 43210
    </div>

</body>
</html>