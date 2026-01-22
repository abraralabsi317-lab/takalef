<?php

date_default_timezone_set("Asia/Aden");
$currentTimezone = date_default_timezone_get();

// اسم الملف
$fileName = "example.txt";

/*  التعامل مع الملفات  */

// نقوم إنشاء ملف اذا لم يكن موجود
if (!file_exists($fileName)) {
    $file = fopen($fileName, "w");
    fwrite($file, "ملف تجريبي\n");
    fclose($file);
}

// فتح الملف للقراءة والكتابة
$file = fopen($fileName, "a+");
$fileSize = filesize($fileName);

// قراءة محتوى الملف 
$content = "";
if ($fileSize > 0) {
    rewind($file); 
    $content = fread($file, $fileSize);
}

// كتابة التاريخ الحالي في الملف
$currentDate = date("Y-m-d H:i:s");
fwrite($file, "وقت التنفيذ: $currentDate\n");
fclose($file);

/*  الوقت والتاريخ  */

$now        = time();
$nextWeek   = strtotime("+1 week");
$customTime = mktime(8, 0, 0, 6, 1, 2025);
$dateInfo   = getdate();
$isValid    = checkdate(2, 29, 2024);

/*  المنطقة الزمنية  */

$tzObject  = timezone_open("Asia/Kuala_Lumpur"); // مثال لكائن منطقة زمنية
$tzList    = timezone_identifiers_list();

// فرق التوقيت بين اليمن وماليزيا
$yemenTime    = new DateTime("now", new DateTimeZone("Asia/Aden"));
$malaysiaTime = new DateTime("now", new DateTimeZone("Asia/Kuala_Lumpur"));
$timeDiff     = $yemenTime->getOffset() - $malaysiaTime->getOffset();

// تحويل فرق التوقيت إلى ساعات ودقائق
$hours = floor(abs($timeDiff) / 3600);
$minutes = floor((abs($timeDiff) % 3600) / 60);
$sign = ($timeDiff >= 0) ? "+" : "-";
$timeDiffFormatted = $sign . str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT);





echo "المنطقة الزمنية الحالية: $currentTimezone <br>";
echo "الوقت الحالي: $currentDate <br>";
echo "Timestamp الحالي: $now <br>";
echo "بعد أسبوع (Timestamp): $nextWeek <br>";
echo "وقت مخصص: " . date("Y-m-d H:i:s", $customTime) . " <br>";
echo "هل التاريخ صحيح؟ " . ($isValid ? "نعم ✅" : "لا ❌") . " <br>";
echo "عدد المناطق الزمنية: " . count($tzList) . " <br>";
echo "فرق التوقيت بين اليمن وماليزيا (بالثواني): $timeDiff <br>";
echo "فرق التوقيت بين اليمن وماليزيا (ساعات:دقائق): $timeDiffFormatted <br>";

?>
