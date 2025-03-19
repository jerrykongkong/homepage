<?php

// 요청할 URL
$url = "http://apis.data.go.kr/B552584/ArpltnInforInqireSvc/getMinuDustWeekFrcstDspth";

// GET 방식으로 전송할 파라미터. 여기서는 예시 값들을 사용합니다.
// 실제 요청에서는 이 값들을 적절한 값으로 교체해야 합니다.
$returnType = $_GET["returnType"]; // 응답 형식 (예: json, xml)
$searchDate = $_GET["searchDate"]; // 검색할 날짜 2024-03-27
$serviceKey = "자신의 Decoding Key를 넣으세요";

// 파라미터를 URL에 쿼리 스트링으로 추가
$fullUrl = sprintf("%s?returnType=%s&searchDate=%s&numOfRows=200&pageNo=1&serviceKey=%s", 
                   $url, $returnType, $searchDate, $serviceKey);

// cURL 세션 초기화
$curl = curl_init();

// cURL 옵션 설정
curl_setopt($curl, CURLOPT_URL, $fullUrl); // 요청할 URL 설정
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 결과를 문자열로 반환받음
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // SSL 인증서 검증 안 함

// HTTP 요청 실행 및 응답 받기
$response = curl_exec($curl);

// cURL 세션 종료
curl_close($curl);

// 응답 출력
echo $response;

?>