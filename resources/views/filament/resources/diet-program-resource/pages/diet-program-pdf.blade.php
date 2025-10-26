<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dietProgram->name }}</title>
    <style>
        html, body {
            font-family: 'DejaVu Sans', sans-serif;
            line-height: 1.4;
            color: #333;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 8px;
            margin: 0 0 15px 0;
            font-size: 14px;
        }

        .info {
            background-color: #ecf0f1;
            padding: 10px 12px;
            border-radius: 4px;
            margin-bottom: 8px;
            font-size: 12px;
            page-break-inside: avoid;
        }

        .info p {
            margin: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8px;
            page-break-inside: avoid;
            padding: 5px !important;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .meal-item {
            margin: 2px 0;
            border-left: 3px solid #3498db;
            padding-left: 5px;
            font-size: 9px;
            page-break-inside: avoid;
        }

        .footer {
            text-align: center;
            color: #777;
            font-size: 10px;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
            page-break-inside: avoid;
        }
        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $dietProgram->name }}</h1>

    <div class="info">
        <p><strong>Danışan Adı:</strong> {{ $dietProgram->client->full_name ?? 'Belirtilmemiş' }}</p>
        <p><strong>Başlangıç Tarihi:</strong> {{ $dietProgram->start_date?->format('d.m.Y') ?? 'Belirtilmemiş' }}</p>
        <p><strong>Bitiş Tarihi:</strong> {{ $dietProgram->target_date?->format('d.m.Y') ?? 'Belirtilmemiş' }}</p>
        @if($dietProgram->notes)
            <p><strong>Notlar:</strong> {{ $dietProgram->notes }}</p>
        @endif
    </div>

    <table>
        <thead>
        <tr>
            <th>Gün / Öğün</th>
            @foreach(\App\Enums\MealTimeEnum::cases() as $time)
                <th>{{ $time->label() }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Enums\ProgramDayEnum::cases() as $day)
            <tr>
                <td><strong>{{ $day->label() }}</strong></td>
                @foreach(\App\Enums\MealTimeEnum::cases() as $time)
                    <td>
                        @if(isset($tableData[$day->value][$time->value]))
                            @foreach($tableData[$day->value][$time->value] as $item)
                                <div class="meal-item">
                                    <strong>{{ $item['meal_name'] }}</strong><br>
                                    <small>{{ $item['quantity'] }} {{ $item['unit'] }}</small>
                                </div>
                            @endforeach
                        @else
                            <em style="color: #95a5a6;">-</em>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Bu diyet programı sizin için özel olarak hazırlanmıştır.</p>
        <p>Sağlıklı günler dileriz!</p>
    </div>
</div>
</body>
</html>
