<?php
error_reporting(-1);
ini_set('display_errors','on');
header('Content-Type: text/html; charset=utf-8');

$text='слово';
$text2='33 коровы';
$text3='1между1';
$text4='сумма11';
$text5='';
$text6='33 слова';

$num=55;
$num2=99;

$float=3.5;
$float2=3.1;
$float3=4.5;
$float4=5.9;

echo 'to integer: ';
$textInt=(int)$text;
	echo $textInt, '; ';
$text2Int=(int)$text2;
	echo $text2Int, '; ';
$text3Int=(int)$text3;
	echo $text3Int, '; ';
$text4Int=(int)$text4;
	echo $text4Int, '; ';
$text5Int=(int)$text5;
	echo $text5Int, ';<br>';

echo 'to boolean: ';
$textBool=(bool)$text;
	var_dump($textBool);
	echo '; ';
$text6Bool=(bool)$text6;
	var_dump($text6Bool);
	echo '; ';
$text4Bool=(bool)$text4;
	var_dump($text4Bool);
	echo '; ';
$numBool=(bool)$num;
	var_dump($numBool);
	echo '; ';
$floatBool=(bool)$float;
	var_dump($floatBool);
	echo ';<br>';

echo 'to integer: ';
$float2Int=(int)$float2;
	echo $float2Int, '; ';
$float3Int=(int)$float3;
	echo $float3Int, '; ';
$float4Int=(int)$float4;
	echo $float4Int, '; ';
	echo '99 уже integer.';

