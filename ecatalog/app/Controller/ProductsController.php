<?php

App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

    public $uses = array('Product', 'Mark', 'Application', 'Image', 'Keyword', 'ProductsKeyword', 'ApplicationsProduct');

    public function admin_index() {
        $this->set('products', $this->Product->find('all'));
    }

    public function admin_view($id = null) {
        $this->Product->id = $id;
        $this->set('product', $this->Product->read());
    }

    public function admin_add() {

        $this->set('marks', $this->Mark->find('list'));
        $this->set('applications', $this->Application->find('list'));
        $this->set('keywords', $this->Keyword->find('list'));

        if ($this->request->is('post')) {
            if ($this->Product->save($this->request->data)) {
                $exist_keywords = array();
                if (isset($this->request->data['Product']['Keyword'])) {
                    $keywords = split(',', $this->request->data['Product']['Keyword']);
                    foreach ($keywords as $item) {
                        $key_id = null;
                        $keyw = null;
                        if (!in_array(trim($item), $exist_keywords) && trim($item) != '') {
                            $exist_keywords[] = trim($item);
                            $keyw = $this->Keyword->findByName(trim($item));
                            $key_id = $keyw['Keyword']['id'];
                            if (isset($key_id)) {
                                $this->ProductsKeyword->create();
                                $this->ProductsKeyword->set('product_id', $this->Product->id);
                                $this->ProductsKeyword->set('keyword_id', $key_id);
                                $this->ProductsKeyword->save();
                            } else {
                                $this->Keyword->create();
                                $this->Keyword->set('name', trim($item));
                                if ($this->Keyword->save()) {
                                    $this->ProductsKeyword->create();
                                    $this->ProductsKeyword->set('product_id', $this->Product->id);
                                    $this->ProductsKeyword->set('keyword_id', $this->Keyword->id);
                                    $this->ProductsKeyword->save();
                                }
                            }
                        }
                    }
                }

                $applications = $this->request->data['Product']['Application'];
                if (is_array($applications)) {
                    foreach ($applications as $item) {
                        $this->ApplicationsProduct->create();
                        $this->ApplicationsProduct->set('product_id', $this->Product->id);
                        $this->ApplicationsProduct->set('application_id', $item);
                        $this->ApplicationsProduct->save();
                    }
                }

                $exts = array('image/gif', 'image/jpeg', 'image/png');
                $images = $this->request->data['Image'];

                foreach ($images as $item) {
                    $image = $item['image'];

                    if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                        $extension = end(explode(".", basename($image['name'])));
                        $target_name = String::uuid() . '.' . $extension;
                        $target_path = 'img' . DS . 'images' . DS . $target_name;
                        move_uploaded_file($image['tmp_name'], $target_path);

                        $this->Image->create();
                        $this->Image->set('product_id', $this->Product->id);
                        $this->Image->set('image', $target_name);
                        $this->Image->save();
                    }
                }

                $this->Session->setFlash(__('El producto ha sido guardado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar el producto.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->Product->id = $id;
        $this->set('marks', $this->Mark->find('list'));
        $this->set('keywords', $this->Keyword->find('list'));
        $this->set('applications', $this->Product->Application->find('list'));
        $product = $this->Product->read();
        $images_list = $product['Image'];
        $this->set('images_list', $images_list);

        $keywords_list = array();
        foreach ($product['Keyword'] as $item) {
            $keywords_list[] = $item['name'] . ',';
        }

        $this->set('keywords_list', $keywords_list);

        if ($this->request->is('get')) {
            $this->request->data = $product;
        } else {
            if ($this->Product->save($this->request->data)) {
                $this->Product->ApplicationsProduct->deleteAll(array('ApplicationsProduct.product_id' => $this->Product->id), false);
                $applications = $this->request->data['Product']['Application'];
                if (!is_array($applications))
                    $applications = array();
                foreach ($applications as $item) {
                    $this->ApplicationsProduct->create();
                    $this->ApplicationsProduct->set('product_id', $this->Product->id);
                    $this->ApplicationsProduct->set('application_id', $item);
                    $this->ApplicationsProduct->save();
                }
                $this->ProductsKeyword->deleteAll(array('ProductsKeyword.product_id' => $this->Product->id), false);
                $exist_keywords = array();
                if (isset($this->request->data['Product']['Keyword'])) {
                    $keywords = split(',', $this->request->data['Product']['Keyword']);
                    foreach ($keywords as $item) {
                        $key_id = null;
                        $keyw = null;
                        if (!in_array(trim($item), $exist_keywords) && trim($item) != '') {
                            $exist_keywords[] = trim($item);
                            $keyw = $this->Keyword->findByName(trim($item));
                            $key_id = $keyw['Keyword']['id'];
                            if (isset($key_id)) {
                                $this->ProductsKeyword->create();
                                $this->ProductsKeyword->set('product_id', $this->Product->id);
                                $this->ProductsKeyword->set('keyword_id', $key_id);
                                $this->ProductsKeyword->save();
                            } else {
                                $this->Keyword->create();
                                $this->Keyword->set('name', trim($item));
                                if ($this->Keyword->save()) {
                                    $this->ProductsKeyword->create();
                                    $this->ProductsKeyword->set('product_id', $this->Product->id);
                                    $this->ProductsKeyword->set('keyword_id', $this->Keyword->id);
                                    $this->ProductsKeyword->save();
                                }
                            }
                        }
                    }
                }

                foreach ($this->request->data['DeleteImage'] as $item) {
                    if (isset($item['value']) && $item['value'] != 0) {
                        $image = $this->Image->read(null, $item['value']);
                        $this->Image->delete($item['value']);
                        if (file_exists('img' . DS . 'images' . DS . $image['Image']['image'])) {
                            unlink('img' . DS . 'images' . DS . $image['Image']['image']);
                        }
                    }
                }

                $exts = array('image/gif', 'image/jpeg', 'image/png');
                $images = isset($this->request->data['Image']) ? $this->request->data['Image'] : array();
                if (is_array($images)) {
                    foreach ($images as $item) {
                        $image = $item['image'];

                        if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                            $extension = end(explode(".", basename($image['name'])));
                            $target_name = String::uuid() . '.' . $extension;
                            $target_path = 'img' . DS . 'images' . DS . $target_name;
                            move_uploaded_file($image['tmp_name'], $target_path);

                            $this->Image->create();
                            $this->Image->set('product_id', $this->Product->id);
                            $this->Image->set('image', $target_name);
                            $this->Image->save();
                        }
                    }
                }

                $this->Session->setFlash(__('El producto ha sido actualizado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar el producto.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Product->id = $id;
        $product = $this->Product->read();
        $images = $product['Image'];

        if ($this->Product->delete($id)) {

            foreach ($images as $item) {
                if (file_exists('img' . DS . 'images' . DS . $item['image'])) {
                    unlink('img' . DS . 'images' . DS . $item['image']);
                }
            }

            $this->Session->setFlash(__('El producto ha sido eliminado.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
