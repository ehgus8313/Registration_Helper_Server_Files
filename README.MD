# KDU_Library
KDU_Library Project PHP Server by KDH

## 파일설명 : ***Login.php***

로그인시 **아이디와 비밀번호를 확인**해주는 기능수행.
userID, userPassword를 매개변수로 받은이후에 해당사용자가 존재하는지 USER테이블에서 검사
userID, userPassword 둘다 문자형이기 떄문에 ss 즉 String형태로 매개변수 전송
이후에 나온 결과값에서 userID를 추출해서 서버에서 하나라도 결과값이 존재한다면 즉 회원이 존재한다면
success값을 false -> true로 바꿔줌.

서버에 회원이 존재한다면 -> true
서버에 회원이 존재하지 않는다면 -> false

## 파일설명 : ***Register.php***

**회원가입**을 위한 기능수행.
userID, userPassword, userName, userMajor 4가지의 회원정보를 입력받았을때
USER라는 데이터베이스 테이블안에 해당정보를 입력할수있도록함.
각각의 구성요소들은 문자열 형태이기 때문에 "ssss" String문자열 형태로 설정
회원가입이 완료된후에 success변수에 true값을 넣어줘서 회원에게 response를 해서
회원가입이 성공됨을 알려줌.

## 파일설명 : ***UserValidate.php***

회원가입시 아이디 **중복체크** 기능수행.
userID를 입력받아 현재 USER가 현재 데이터베이스에 이미 존재하는 USER인지를 확인해주는 기능 수행.
만약에 해당 USER가 존재하는 경우 success변수를 false로 바꿔줌으로써 회원가입 할수없는 정보임을 알려줌.

## 파일설명 : ***NoticeList.php***

로그인시 **아이디와 비밀번호를 확인**해주는 기능수행.
NOTICE 테이블 안에서 noticeDate를 기준으로 내림차순으로 정렬(최신날짜가 먼저 나오도록)
배열을 생성한후 noticeContent, noticeName, noticeDate에 데이터를 받아와서 response형태로 사용자에게 보여줄수있도록 함.
