# laravel DDD

## webapp

-   OS: CentOS7
-   PHP: 7.2.x
-   Composer: 1.10.x
-   Laravel: 5.x
-   Nginx: 1.18.x

### Port Mapping

-   22: localhost:22011
-   80: localhost:8080
-   9001: localhost:9011

## mysql

-   ユーザー名： root
-   パスワード： root
-   データベース：test_database

### Port Mapping

-   3306: localhost:13306

## phpmyadmin

### Port Mapping

-   80: localhost:8081

## setup

```
docker-compose up -d
docker exec -it php-webapp /docker-bootstrap.sh
```

## 参考

-   https://www.youtube.com/watch?v=ZSjc2tqUmmI
# laravel-ddd
