<?php

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class RestController extends AppController {

    public $uses = array('Sector', 'Application', 'Mark', 'Product', 'Image', 'Pdf', 'Keyword', 'ProductsKeyword', 'Version', 'Home');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    public function GetAllSectors() {
        $data = array();
        $data['isValid'] = true;
        $data['items'] = array();

        $host = 'http://' . $this->request->host();

        $sectors = $this->Sector->find('all', array('order' => array('Sector.order' => 'asc')));

        foreach ($sectors as $item) {
            $data['items'][] = array(
                'id' => $item['Sector']['id'],
                'name' => $item['Sector']['name'],
                'image' => $host . '/img/sectors/' . $item['Sector']['image'],
                'countApps' => count($item['Application'])
            );
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllKeywords() {
        $data = array();
        $data['isValid'] = true;
        $data['items'] = array();

        $keywords = $this->Keyword->find('all');

        foreach ($keywords as $item) {
            $data['items'][] = array(
                'id' => $item['Keyword']['id'],
                'name' => $item['Keyword']['name']
            );
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllAppsBySector($idSector = null) {
        $data = array();
        $data['isValid'] = $idSector ? true : false;
        $data['items'] = array();

        if ($idSector) {
            $host = 'http://' . $this->request->host();

            $applications = $this->Application->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'applications_sectors',
                        'alias' => 'ApplicationsSector',
                        'type' => 'inner',
                        'conditions' => "ApplicationsSector.application_id = Application.id AND ApplicationsSector.sector_id = $idSector"
                    )
                ),
                'order' => array('Application.order' => 'asc')
                    ));

            foreach ($applications as $item) {
                $data['items'][] = array(
                    'id' => $item['Application']['id'],
                    'idSector' => $idSector,
                    'name' => $item['Application']['name'],
                    'image' => $host . '/img/applications/' . $item['Application']['image'],
                    'countMarks' => count($item['Application'])
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllAppsByProduct($idProduct = null) {
        $data = array();
        $data['isValid'] = $idProduct ? true : false;
        $data['items'] = array();

        if ($idProduct) {
            $host = 'http://' . $this->request->host();

            $applications = $this->Application->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'applications_products',
                        'alias' => 'ApplicationsProduct',
                        'type' => 'inner',
                        'conditions' => "ApplicationsProduct.application_id = Application.id AND ApplicationsProduct.product_id = $idProduct"
                    )
                ),
                'order' => array('Application.order' => 'asc')
                    ));

            foreach ($applications as $item) {
                $data['items'][] = array(
                    'id' => $item['Application']['id'],
                    'idSector' => $idProduct,
                    'name' => $item['Application']['name'],
                    'image' => $host . '/img/applications/' . $item['Application']['image'],
                    'countApplication' => count($item['Application'])
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllMarksByApp($idApp = null) {
        $data = array();
        $data['isValid'] = $idApp ? true : false;
        $data['items'] = array();

        if ($idApp) {
            $host = 'http://' . $this->request->host();

            $marks = $this->Mark->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'products',
                        'alias' => 'Product',
                        'type' => 'inner',
                        'conditions' => "Mark.id = Product.mark_id"
                    ),
                    array(
                        'table' => 'applications_products',
                        'alias' => 'ApplicationsProduct',
                        'type' => 'inner',
                        'conditions' => "Product.id = ApplicationsProduct.product_id"
                    ),
                    array(
                        'table' => 'applications',
                        'alias' => 'Application',
                        'type' => 'inner',
                        'conditions' => "ApplicationsProduct.application_id = Application.id AND Application.id = $idApp"
                    )
                ),
                'fields' => array('DISTINCT Mark.*'),
                'order' => array('Mark.order' => 'asc')
                    )
            );

            foreach ($marks as $item) {
                $data['items'][] = array(
                    'id' => $item['Mark']['id'],
                    'idApp' => $idApp,
                    'name' => $item['Mark']['name'],
                    'image' => $host . '/img/marks/' . $item['Mark']['image'],
                    'countProducts' => count($item['Product'])
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllProductsByMark($idMark = null, $idApp = null) {
        $data = array();
        $data['isValid'] = $idMark && $idApp ? true : false;
        $data['items'] = array();

        if ($idMark) {
            $host = 'http://' . $this->request->host();

            $products = $this->Product->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'applications_products',
                        'alias' => 'ApplicationsProduct',
                        'type' => 'inner',
                        'conditions' => "Product.id = ApplicationsProduct.product_id AND ApplicationsProduct.application_id = $idApp"
                    )
                ),
                'conditions' => array(
                    'Product.mark_id' => $idMark
                )
                    ));

            foreach ($products as $item) {
                $data['items'][] = array(
                    'id' => $item['Product']['id'],
                    'idMark' => $idMark,
                    'name' => $item['Product']['name'],
                    'countImages' => count($item['Image']),
                    'countPdfs' => count($item['Pdf']),
                    'countKeywords' => count($item['Keyword']),
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllImagesByProduct($idProduct = null) {
        $data = array();
        $data['isValid'] = $idProduct ? true : false;
        $data['items'] = array();

        if ($idProduct) {
            $host = 'http://' . $this->request->host();

            $images = $this->Image->find('all', array(
                'conditions' => array(
                    'Image.product_id' => $idProduct
                )
                    ));

            foreach ($images as $item) {
                $data['items'][] = array(
                    'id' => $item['Image']['id'],
                    'idProduct' => $idProduct,
                    'image' => $host . '/img/images/' . $item['Image']['image']
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllPdfsByProduct($idProduct = null) {
        $data = array();
        $data['isValid'] = $idProduct ? true : false;
        $data['items'] = array();

        if ($idProduct) {
            $host = 'http://' . $this->request->host();

//            $options['order'] = array('Product.name' => 'asc', 'order' => 'asc');
//            $this->set('pdfs', $this->Pdf->find('all', $options));


            $pdfs = $this->Pdf->find('all', array(
                'conditions' => array(
                    'Pdf.product_id' => $idProduct
                ),
                'order' => array('Pdf.order' => 'asc')
                    )
            );

            foreach ($pdfs as $item) {
                $data['items'][] = array(
                    'id' => $item['Pdf']['id'],
                    'idProduct' => $idProduct,
                    'name' => $item['Pdf']['name'],
                    'description' => $item['Pdf']['description'],
                    'file' => $host . '/files/pdfs/' . $item['Pdf']['file'],
                    'order' => $item['Pdf']['order']
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetAllKeywordsByProduct($idProduct) {
        $data = array();
        $data['isValid'] = $idProduct ? true : false;
        $data['items'] = array();

        if ($idProduct) {
            $keywords = $this->Keyword->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'products_keywords',
                        'alias' => 'ProductsKeyword',
                        'type' => 'inner',
                        'conditions' => "ProductsKeyword.keyword_id = Keyword.id AND ProductsKeyword.product_id = " . $idProduct
                    )
                )
                    ));

            foreach ($keywords as $item) {
                $data['items'][] = array(
                    'id' => $item['Keyword']['id'],
                    'idProduct' => $idProduct,
                    'name' => $item['Keyword']['name']
                );
            }
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetVersion() {
        $data = array();
        $host = 'http://' . $this->request->host();

        $versions = $this->Version->find('first', array(
            'order' => array('Version.id' => 'desc')
                ));

        if (isset($versions)) {
            $data['id'] = $versions['Version']['id'];
            $data['string'] = $host . '/files/versions/' . $versions['Version']['file'];
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

    public function GetHomeTextImage() {
        $data = array();
        $host = 'http://' . $this->request->host();

        $home = $this->Home->find('first', array(
            'order' => array('Home.id' => 'desc')
                ));

        if (isset($home)) {
            $data['title'] = $home['Home']['title'];
            $data['text'] = $home['Home']['text'];
            $data['image'] = $host . '/img/homes/' . $home['Home']['image'];
        }

        $this->response->body(json_encode($data));
        return $this->response;
    }

}
