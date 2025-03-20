<?php

// 설정값 (API 서비스 키 - 본인의 키로 변경하세요)
$serviceKey = "YOUR_SERVICld4ZrFJ2DtzV85lnDWM28ruYwlmzC7lM7LsdcmmPVDiAQG4Z1+eun27KSwpAY6sCp9kKgfFZv9dQ0nFKWHGFkQ=="; 

// 요청 파라미터 (GET 방식)
$params = [
    "sigunguCd" => "11680",   // 시군구 코드
    "bjdongCd"  => "10300",   // 법정동 코드
    "platGbCd"  => "0",       // 대지구분코드 (0: 대지, 1: 산, 2: 블록)
    "bun"       => "0012",    // 번
    "ji"        => "0000",    // 지
    "startDate" => "20240101", // 검색 시작일 (YYYYMMDD)
    "endDate"   => "20241231", // 검색 종료일 (YYYYMMDD)
    "numOfRows" => "10",      // 한 페이지당 개수
    "pageNo"    => "1",       // 페이지 번호
    "_type"     => "json",    // 응답 타입 (json 또는 xml)
    "serviceKey"=> $serviceKey // API 키
];

// URL 조합
$baseUrl = "https://apis.data.go.kr/1613000/BldRgstHubService/getBrTitleInfo";
$queryString = http_build_query($params);
$requestUrl = "{$baseUrl}?{$queryString}";

// cURL을 이용한 API 요청
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $requestUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 응답 확인
if ($httpCode == 200) {
    // JSON 데이터 출력
    header('Content-Type: application/json; charset=UTF-8');
    echo $response;
} else {
    // 오류 처리
    http_response_code($httpCode);
    echo json_encode([
        "error" => "Failed to retrieve data",
        "httpCode" => $httpCode
    ]);
}

?>
