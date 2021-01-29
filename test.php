<?php
\umask(0);//给后面的代码调用函数mkdir给出最大的权限，避免了创建目录或文件的权限不确定性。
$pid = pcntl_fork();
if (-1 === $pid) {
    throw new Exception('Fork fail');
} elseif ($pid > 0) {
    //结束父进程
    echo posix_getpid().PHP_EOL;
    exit(0);
}
echo posix_getpid().PHP_EOL;
//posix_setsid 设置会话id 使当前子进程成为会话id的leader. 
if (-1 === \posix_setsid()) {
    throw new Exception("Setsid fail");
}
// Fork again avoid SVR4 system regain the control of terminal.
$pid = \pcntl_fork();
if (-1 === $pid) {
    throw new Exception("Fork fail");
} elseif (0 !== $pid) {
    echo posix_getpid().PHP_EOL;
    exit(0);
}

while(true){
    sleep(2);
    echo posix_getpid().PHP_EOL;
}