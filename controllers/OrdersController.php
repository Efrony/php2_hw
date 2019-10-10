<?php


namespace app\controllers;

use app\engine\App;
use app\model\entities\Orders;



class OrdersController extends Controller
{
    public function actionDefault()
    {
        $ordersList = App::call()->ordersRepository->getArrayWhere('id_session', $this->session);
        echo $this->render('orders', ['ordersList' => $ordersList]);
    }

    public function actionSendOrder()
    {
        if (isset(App::call()->request->params['sendOrder'])) {
                $phone = App::call()->request->params['phone'];
                if ($phone == '') {
                    $message = 'Вы не указали телефон';
                    header("Location: /cart/default/?phoneMessage={$message}");
                    die;
                }
                $email = App::call()->usersRepository->getUser();
                $country = App::call()->request->params['country'];
                $state = App::call()->request->params['state'];
                $zip = App::call()->request->params['zip'];

                $address = "$country $state $zip";

                $orderProducts = App::call()->cartRepository->getColumnWhere('id_product', 'id_session', $this->session);
                $orderProducts = implode(';', $orderProducts);
                $name =  App::call()->request->params['name'];
                $summCart = App::call()->cartRepository->summCart($this->session);

                $newOrder = new Orders($email, $address, $phone, $orderProducts, $name, $summCart, $this->session);
                App::call()->ordersRepository->insert($newOrder);

                App::call()->cartRepository->clearCart($this->session);
                $orderMessage = $newOrder->id;
                header("Location: /cart/default/?orderMessage={$orderMessage}");
            }
        }
}