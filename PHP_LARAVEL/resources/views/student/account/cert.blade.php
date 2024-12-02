<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شهادة شكر وتقدير</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
        }
        .certificate-container {
            background-color: #fff;
            border: 2px solid #000;
            border-radius: 10px;
            padding: 40px;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .certificate-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
        }
        .certificate-body {
            font-size: 22px;
            line-height: 2;
            margin-bottom: 20px;
            text-align: center;
        }
        .student-name {
            font-size: 28px;
            font-weight: bold;
            color: #003366;
            margin: 10px 0;
        }
        .club-name {
            color: #007bff;
            font-weight: bold;
        }
        .footer-text {
            font-size: 18px;
        }
        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container img {
            height: 70px;
        }
        .divider {
            height: 4px;
            background-color: #003366;
            margin: 20px 0;
        }
        /* Hide buttons during print */
        @media print {
            .action-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>
<!-- Action Buttons -->
<div class="action-buttons mb-3">
    <button class="btn btn-primary" onclick="printCertificate()">Print Certificate & PDF</button>
</div>

<div class="certificate-container">
    <!-- Logos -->
    <div class="logo-container mb-4">
        <img src="{{ asset('logo.svg') }}" alt="Logo">
    </div>

    <!-- Title -->
    <div class="certificate-header">
        <h1 class="certificate-title">شهـــادة شكر وتقدير</h1>
    </div>

    <!-- Divider -->
    <div class="divider"></div>

    <!-- Body -->
    <div class="certificate-body">
        <p>
            یسر الإدارة العامة للتعليم بالهیئة الملکیة بالجبیل ممثلة
            بنادي <span class="club-name">{{ optional($certificate->event->club)->club_name }}</span>
            بکلیة الجبیل الصناعیة أن تتقدم بجزیل الشکر والعرفان
        </p>
        <p class="student-name">{{ $certificate->student?->student_name }}</p>
        <p class="footer-text">
            لجھوده المتمیزة في فعالیات وبرامج النشاط الطلابيّ للعام الدراسي
        </p>
        <p>تاريخ الاصدار : {{ $certificate->issue_date }}</p>
        <p>الايفينت : {{ $certificate->event?->event_name }}</p>
    </div>
</div>

<script>
    function printCertificate() {
        window.print();
    }
</script>
</body>
</html>
