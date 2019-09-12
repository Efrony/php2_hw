<?php

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
// переменная static не переопределяется в памяти для текущего класса. Она привязана к классу
$a1 = new A();
$a2 = new A();
$a1->foo(); //1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4

echo '<br>';



class C {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends C {
}
//создается копия родительского класса. т.е. получется у каждого их классов своя переменная static
$c1 = new C();
$b1 = new B();
$c1->foo(); //1
$b1->foo(); //1
$c1->foo(); //2
$b1->foo(); //2

echo '<br>';


class E { // убрали скобочки при создании экземпляра класса. Кажется, это никак не повлияло.
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class D extends E {
}
$e1 = new E;
$d1 = new D;
$e1->foo(); //1
$d1->foo(); //1
$e1->foo(); //2
$d1->foo(); //2

