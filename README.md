## Тестовое задание для Quantron Systems
### Базовая аутефикация
#### Комментарии реализации: 
- по хорошему стоит разнести классы контроллеров, моделей вьюх и wide-app классы по разным директориям (не увидел смысла делать это сейчас, когда не ясна будущая структура проекта)
- для контроллеров, вьюх и моделей очевидно нужны супер классы, от которых они наследовались бы, но для этой задачи нашел это излишним усложнением
- вьюхи очевидно стоит делать через шаблоны, однако это решение для данной задачи нашел таким же лишним
- не реализован роутинг, так как это выходит за пределы задачи
- использование безопасного password_hash тянет за собой зависимость от библиотеки password_compat (https://github.com/ircmaxell/password_compat). В PHP >= 5.5 такой зависимости не требуется.

Вообще большинство описанных выше заметок связано с тем, что они реализуются внутри фрейморвка (Zend, Symphony). Самопальные реализации в особенности для типичных задач тянут за собой велосипедостроение и проблемы с поддержкой в будущем.

#### Пример пользователей в базе данных по умолчанию
sample_user@gmail.com, пароль: cool_password

heyzea1@gmail.com, пароль:  another_password