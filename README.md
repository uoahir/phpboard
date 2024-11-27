### PHP 를 이용한 자유게시판 만들기
#### 수영 좋아하는 물개들을 위한 게시판 🦭

이 프로젝트는 수영을 좋아하는 사람들이 모여 정보를 나누고 소통할 수 있는 게시판 웹 어플리케이션입니다. <br>
사용자들이 글을 작성하고, 글 목록을 조회하고, 글을 수정하거나 삭제할 수 있는 기능을 제공합니다.

### 프로젝트 설명

이 게시판은 PHP와 MySQL을 사용하여 개발되었습니다.

#### 주요기능
- 글 목록 조회 : 모든 사람이 게시된 글을 목록 형식으로 조회할 수 있습니다.
- 글 상세 조회 : 모든 사람이 게시글의 상세화면을 조회할 수 있습니다.
- 글 작성 : 로그인한 사용자만 게시글을 작성할 수 있습니다.
- 글 수정 : 작성자만 해당 게시글을 수정할 수 있습니다.
- 글 삭제 : 작성자만 해당 게시글을 삭제할 수 있습니다.
- 로그인 / 로그아웃 : 사용자는 로그인하고 로그아웃할 수 있습니다.

<br>

| 게시글 조회                                     |  게시글 상세보기                                      |게시글 작성                                      | 게시글 수정                                      |
|-----------------------------------------------|-----------------------------------------------|-----------------------------------------------|-----------------------------------------------|
| ![Feature 1](https://github.com/user-attachments/assets/5a6f507b-2072-47c4-b9e6-8118b43edfdb) | ![Feature 3](https://github.com/user-attachments/assets/bf3bd282-ec48-412f-9432-3c0a86df3002) | ![Feature 4](https://github.com/user-attachments/assets/ec28a453-fda1-4b4e-92a1-66b1b19994f6)| ![Feature 5](https://github.com/user-attachments/assets/f4b8c1f1-b050-4e1f-8cd0-6a338f1f3c96)

#### 개발환경
- XAMPP 8.2.4 : Apache, MariaDB, PHP 올인원 서버패키지
- 서버 : Apache 2.4.56
- 프로그래밍 언어 : PHP 8.2.4
- 데이터베이스 : MariaDB 10.4.28
- 기타 : HTML, CSS, JAVASCRIPT

### 📄 설치 및 실행 가이드
1. **필수 소프트웨어 설치**
   - XAMPP 8.2.4 버전을 설치하거나, 개별적으로 Apache, PHP, MariaDB를 설치합니다.
   - XAMPP 설치 시 [여기](https://www.apachefriends.org/)에서 다운로드 가능합니다.
   
2. **프로젝트 다운로드**:
   - GitHub에서 프로젝트를 클론하거나, 압축 파일을 다운로드합니다.

3. **Apache 설정**:
   - Apache의 `httpd.conf` 파일에서 `DocumentRoot`와 `Directory` 경로를 프로젝트 폴더로 수정합니다.
     - XAMPP에서는 보통 `C:\xampp\apache\conf\httpd.conf` 또는 `/Applications/XAMPP/xamppfiles/etc/httpd.conf`에 위치합니다.
     - 아래와 같이 설정합니다:
       ```bash
       DocumentRoot "/Users/username/your-project"
       <Directory "/Users/username/your-project">
           AllowOverride All
           Require all granted
       </Directory>
       ```

4. **MariaDB/MySQL 데이터베이스 설정**:
   - MariaDB/MySQL에 데이터베이스를 생성한 후, 첨부된 `phpboard.sql` 파일을 실행하여 테이블과 더미 데이터를 생성합니다.
     
5. **.htaccess 설정**:
   - `.htaccess` 파일을 통해 모든 요청을 `index.php`로 리디렉션하도록 설정합니다. 해당 파일에 다음과 같은 내용을 추가합니다:
     ```bash
     RewriteEngine On
     RewriteRule ^$ /index.php [L]
     RewriteRule (.*) /index.php/$1 [L]
     ```
6. **브라우저에서 실행**:
   - 브라우저를 열고 `http://localhost`로 접속하여 프로젝트를 실행합니다.
  
7. **테스트 계정**:
   - 테스트 계정 정보:
     - 아이디: `swimmer1@example.com`
     - 비밀번호: `password123`





