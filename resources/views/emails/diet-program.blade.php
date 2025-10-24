<!DOCTYPE html>

<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dietProgram->name }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-top: 0;
            font-size: 1.8rem;
        }
        .info {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 0.95rem;
        }
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            min-width: 600px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top;
            font-size: 0.9rem;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .meal-item {
            margin: 5px 0;
            background-color: #fff;
            border-left: 3px solid #3498db;
            padding: 5px 5px 5px 10px;
            border-radius: 3px;
            font-size: 0.9rem;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #7f8c8d;
            font-size: 0.85rem;
        }
        /* --- Responsive --- */
        @media (max-width: 600px) {
            .container {
                padding: 20px 15px;
                border-radius: 0;
                box-shadow: none;
            }
            h1 {
                font-size: 1.4rem;
                text-align: center;
            }
            .info p {
                font-size: 0.9rem;
                margin: 6px 0;
            }
            table {
                font-size: 0.85rem;
                min-width: unset;
            }
            th, td {
                padding: 8px;
            }
            .meal-item {
                font-size: 0.85rem;
            }
            .footer {
                font-size: 0.8rem;
                line-height: 1.4;
            }
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

    <div class="table-wrapper">
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
    </div>

    <div class="footer">
        <p>Bu diyet programı sizin için özel olarak hazırlanmıştır.</p>
        <p>Sağlıklı günler dileriz! 🥗</p>
    </div>
</div>
</body>
</html>
