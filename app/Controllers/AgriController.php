<?php
	
	namespace App\Controllers;
	use CodeIgniter\Controller;
	use App\Models\AgriculteurModel;
	
	class AgriController extends BaseController
	{
		public function index()
		{
			$agriModel =new AgriculteurModel();
			$data['agriculteur']=$agriModel->orderBy('id', 'DESC')->findAll();
			return view ('crud_view',$data);
		}		
		
		public function ajout() {
			$agriModel = new AgriculteurModel();
			$data = [
				'cvl' => $this->request->getVar('cvl'),
				'nom' => $this->request->getVar('nom'),
				'prenom'  => $this->request->getVar('prenom'),
				'age'  => $this->request->getVar('age')
			];
			$agriModel->insert($data);
				return $this->response->redirect(site_url('/agri_list'));
		}
		
		public function delete($id = null)
		{ 
			$agriModel = new AgriculteurModel();
			$data['agriculteur'] = $agriModel->where('id', $id)->delete($id);
			return $this->response->redirect(site_url('/agri_list'));
		}    
		
		
		
	}