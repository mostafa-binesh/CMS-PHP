<?php
// echo $pass =  hash('ripemd320', 'The quick brown fox jumped over the lazy dog.');
$password = 'qwe';
// echo $hash = password_hash($password,PASSWORD_ARGON2ID);
$hash = '$argon2id$v=19$m=65536,t=4,p=1$azlDa2xIemVZazRGbWJTLg$o6URilwx0xm9HQCr2fj+DUHWdhWEEokbrbhyEzHPapw';
echo '<br>';
echo strlen($hash);
echo '<br>';

if (password_verify('qwe', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>