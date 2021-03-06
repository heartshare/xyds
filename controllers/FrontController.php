<?php
/**
 * Author: luoao,li
 * Date: 2017/3/30
 * Time: 11:26
 * Function:
 */

namespace app\controllers;

use app\models\Article;
use app\models\CompanyNews;
use app\models\Company;
use app\models\CompanyProduct;
use app\models\Contact;
use app\models\ThirdPartyService;
use app\models\CompanyRecruit;
use app\models\Ectrain;
use app\models\Dictitem;
use app\models\EctrainEnter;
use app\models\PublicInfo;
use app\models\Video;
use app\models\Pic;
use yii;
use yii\web\Controller;
use app\common\Common;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\db\Query;

class FrontController extends Controller{
	public $layout = "common";
	public $enableCsrfValidation = false;
	public $layout_data;
	/**
	 * 首页
	 * @return string
	 */
	public function actionIndex(){
		$this->layout_data = '0';
		$pic1 = Pic::find()->where('category=0')->one();
		$pic2 = Pic::find()->where('category=1')->one();
		$pic3 = Pic::find()->where('category=2')->one();
		$pic4 = Pic::find()->where('category=3')->one();
		return $this->render('index',[
			'pic1'=>$pic1,
			'pic2'=>$pic2,
			'pic3'=>$pic3,
			'pic4'=>$pic4,

		]);
	}

	/**
	 * @return string
	 * 加入我们
	 */
	public function actionContactus(){
		$pic = Pic::find()->where('category=11')->one();
		return $this->render('contactus',[
			'pic'=>$pic->url,
		]);
	}
	/**
	 * 联系我们页
	 * @return string
	 */
	public function actionAbout(){
		$pic = Pic::find()->where('category=11')->one();
		return $this->render('aboutus',[
				'pic'=>$pic->url,
		]);
	}

	/**
	 * @return string
	 * 提交联系我们信息
	 */
	public function actionConAdd(){
		$contact = new Contact();
		$contact->id = Common::create40ID();
		$contact->gender = Yii::$app->request->post('gender');
		$contact->truename = Yii::$app->request->post('name');
		$contact->mobile = Yii::$app->request->post('mobile');
		$contact->email = Yii::$app->request->post('email');
		$contact->QQ = Yii::$app->request->post('QQ');
		$contact->content = Yii::$app->request->post('content');
		$contact->datetime = date('Y-m-d H:i:s');
		if($contact->save()) {
			return 'success';
		}else{
			return 'fail';
		}
	}

	/**
	 * 企业展示页
	 * @return string
	 */
	public function actionEnterpriseDisplay(){
		$this->layout_data = '3';
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('enterprisedisplay',[
				'pic'=>$pic->url,
		]);
	}

	/**
	 * 获取企业ID并前往详情页
	 * @return string
	 */
	public function actionEnterpriseDetail(){
		$this->layout_data = '3';
		$companyId = Yii::$app->request->get('id');
		$company = Company::findOne($companyId);
		$company->count = $company->count+1;
		$company->save();
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('enterprisedetail',[
			'company' => $company,
			'companyId' => $companyId,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 第三方服务
	 * @return string
	 */
	public function actionThird(){
		$this->layout_data = '4';
		$pic = Pic::find()->where('category=4')->one();
		return $this->render('third',[
				'pic'=>$pic->url,
		]);
	}

	/**
	 * 第三方服务详情
	 * @return string
	 */
	public function actionThirdDetail(){
		$this->layout_data = '4';
		$id = Yii::$app->request->get('id');
		$thirdDetail = ThirdPartyService::findOne($id);
		$thirdDetail->count = $thirdDetail->count+1;
		$thirdDetail->save();
		$category = Dictitem::find()->where(['dictCode'=>'DICT_COMPANY_CATEGORY'])->all();
		foreach ($category as $index => $value) {
			if ($thirdDetail->category == $value->dictItemCode) {
				$thirdDetail->category = $value->dictItemName;
			}
		}
		$pic = Pic::find()->where('category=4')->one();
		return $this->render('thirddetail',[
			'thirdDetail'=>$thirdDetail,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 在线招聘
	 * @return string
	 */
	public function actionLine(){
		$this->layout_data = '7';
		$pic = Pic::find()->where('category=7')->one();
		return $this->render('online',[
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 在线招聘详情页
	 * @return string
	 */
	public function actionDetail(){
		$this->layout_data = '7';
		$id = Yii::$app->request->get('id');
		$companyId = Yii::$app->request->get('companyId');
		$company = Company::findOne($companyId);
		$companyRecruit = CompanyRecruit::findOne($id);

		$record = Dictitem::find()->where(['dictCode' => 'DICT_RECORD'])->all();
		foreach ($record as $index => $value) {
			if ($companyRecruit->record == $value->dictItemCode) {
				$companyRecruit->record = $value->dictItemName;
			}
		}

		$pic = Pic::find()->where('category=4')->one();
		return $this->render('onDetail',[
			'companyRecruit'=>$companyRecruit,
			'company'=>$company,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 打开信息公开页面
	 * @return string
	 */
	public function actionPublicInfo(){
		$this->layout_data = '5';
		$pic = Pic::find()->where('category=5')->one();
		return $this->render('info',[
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 信息公开详情页
	 * @return string
	 */
	public function actionInfoDetail(){
		$this->layout_data = '5';
		$id = Yii::$app->request->get('id');
		$info = PublicInfo::findOne($id);
		$info->conunt = $info->conunt+1;
		$info->save();
		$sinfo = PublicInfo::find()
				->orderBy(['published'=>SORT_ASC])
				->where('published>:time',[':time'=>$info->published])
				->limit('0,1')
				->one();
		if(!is_null($sinfo)) {
			$sid = $sinfo->id;
			$stitle = $sinfo->title;
			$spublished = $sinfo->published;
		}else{
			$sid = '';
			$stitle = '';
			$spublished = '';
		}

		$infos = PublicInfo::find()
				->orderBy(['published'=>SORT_DESC])
				->where('published<:time',[':time'=>$info->published])
				->limit('0,1')
				->one();
		if(!is_null($infos)) {
			$ids = $infos->id;
			$titles = $infos->title;
			$publisheds = $infos->published;
		}else{
			$ids = '';
			$titles = '';
			$publisheds = '';
		}
		$pic = Pic::find()->where('category=5')->one();
		return $this->render('infodetail',[
				'info'=>$info,
				'sid'=>$sid,
				'ids'=>$ids,
				'stitle'=>$stitle,
				'titles'=>$titles,
				'spublished'=>$spublished,
				'publisheds'=>$publisheds,
				'pic'=>$pic->url,
		]);
	}

	/**
	 * 电商培训页
	 * @return string
	 */
	public function actionEctrain(){
		$this->layout_data = '2';
		$pic = Pic::find()->where('category=9')->one();
		return $this->render('ectrain',[
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 电商培训通知页
	 * @return string
	 */
	public function actionTrainNotice(){
		$this->layout_data = '2';
		$type = Yii::$app->request->get('type');
		$pic = Pic::find()->where('category=9')->one();
		if(is_null($type)) {
			return $this->render('trainnotice',[
				'type'=> '',
				'pic'=>$pic->url,
			]);
		}else{
			$category = Dictitem::find()->where(['dictCode'=>'DICT_ECTRAIN_CATEGORY'])->all();
			foreach ($category as $index => $value) {
				if ($type == $value->dictItemName) {
					$type = $value->dictItemCode;
				}
			}
			return $this->render('trainnotice',[
					'type'=>$type,
					'pic'=>$pic->url,
			]);
		}
	}

	/**
	 * 电商培训详情页
	 * @return string
	 */
	public function actionTrainDetail(){
		$this->layout_data = '2';
		$ectrainId = Yii::$app->request->get('id');
		$ectrain = Ectrain::findOne($ectrainId);
		$time = date('Y-m-d H:i:s');
		return $this->render('traindetail',[
			'ectrain' => $ectrain,
			'time'=>$time,
		]);
	}

	/**
	 * 在线视频页
	 * @return string
	 */
	public function actionOnlineVideo(){
		$this->layout_data = '2';
		$pic = Pic::find()->where('category=9')->one();
		return $this->render('onlinevideo',[
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 在线视频详情页
	 * @return string
	 */
	public function actionVideoDetail(){
		$this->layout_data = '2';
		$videoId = Yii::$app->request->get('videoId');
		$video = Video::findOne($videoId);
		$svideo = Video::find()
				->orderBy(['datetime'=>SORT_ASC])
				->where('datetime>:time',[':time'=>$video->datetime])
				->limit('0,1')
				->one();
		if(!is_null($svideo)) {
			$sid = $svideo->id;
			$sname = $svideo->name;
			$sdatetime = $svideo->datetime;
		}else{
			$sid = '';
			$sname = '';
			$sdatetime = '';
		}

		$videos = Video::find()
				->orderBy(['datetime'=>SORT_DESC])
				->where('datetime<:time',[':time'=>$video->datetime])
				->limit('0,1')
				->one();
		if(!is_null($videos)) {
			$ids = $videos->id;
			$names = $videos->name;
			$datetimes = $videos->datetime;
		}else{
			$ids = '';
			$names = '';
			$datetimes = '';
		}

		$pic = Pic::find()->where('category=9')->one();
		return $this->render('videodetail',[
			'video' => $video,
			'sid'=>$sid,
			'ids'=>$ids,
			'sname'=>$sname,
			'names'=>$names,
			'sdatetime'=>$sdatetime,
			'datetimes'=>$datetimes,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 企业产品
	 * @return string
	 */
	public function actionProductDisplay(){
		$this->layout_data = '3';
		$companyId = Yii::$app->request->get('id');
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('productdisplay',[
			'companyId' => $companyId,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 企业产品详情
	 * @return string
	 */
	public function actionProductDetail(){
		$this->layout_data = '3';
		$productId = Yii::$app->request->get('productId');
		$companyId = Yii::$app->request->get('companyId');
		$query = new Query();
		$product = $query->select('a.id as id,a.companyId as companyId,b.name as companyName,a.name as name,a.price as price,a.discount as discount,a.introduction as introduction,a.thumbnailUrl as thumbnailUrl')
				->from('companyProduct a')
				->where('a.id=:id',[':id'=>$productId])
				->leftJoin('company b', 'a.companyId = b.id')
				->one();
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('productdetail',[
			'product' => $product,
			'companyId'=>$companyId,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 电商资讯
	 * @return string
	 */
	public function actionEcInfo(){
		$this->layout_data = '1';
		$pic = Pic::find()->where('category=8')->one();
		return $this->render('ecinformation',[
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 电商资讯详情
	 * @return string
	 */
	public function actionEcInfoDetail(){
		$this->layout_data = '1';
		$articleId = Yii::$app->request->get('articleId');
		$article = Article::findOne($articleId);
		$article->count = $article->count+1;
		$article->save();
		$sarticle = Article::find()
				->orderBy(['datetime'=>SORT_ASC])
				->where('datetime>:time',[':time'=>$article->datetime])
				->limit('0,1')
				->one();
		if(!is_null($sarticle)) {
			$sid = $sarticle->id;
			$stitle = $sarticle->title;
			$sdatetime = $sarticle->datetime;
		}else{
			$sid = '';
			$stitle = '';
			$sdatetime = '';
		}
		$articles = Article::find()
				->orderBy(['datetime'=>SORT_DESC])
				->where('datetime<:time',[':time'=>$article->datetime])
				->limit('0,1')
				->one();
		if(!is_null($articles)) {
			$ids = $articles->id;
			$titles = $articles->title;
			$datetimes = $articles->datetime;
		}else{
			$ids = '';
			$titles = '';
			$datetimes = '';
		}
		$pic = Pic::find()->where('category=8')->one();
		return $this->render('ecinformationdetail',[
			'article' => $article,
			'sid'=>$sid,
			'ids'=>$ids,
			'stitle'=>$stitle,
			'titles'=>$titles,
			'sdatetime'=>$sdatetime,
			'datetimes'=>$datetimes,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * @return string
	 * 搜索
	 */
	public function actionSearch(){
		$this->layout_data = '1';
		$title = Yii::$app->request->get('title');
		return $this->render('search',[
				'title'=>$title,
		]);
	}

	/**
	 * @return string
	 * 加载搜索信息，并实现分页
	 */
	public function actionFindMore(){
		$title = Yii::$app->request->post('title');
		$page = Yii::$app->request->post('page');
		$whereStr = " title like '%" . $title . "%'";
		$query = Article::find()
				->where($whereStr)
				->count();


		$pagination = new Pagination([
				'page' => $page,
				'defaultPageSize' => 10,
				'validatePage' => false,
				'totalCount' => $query,
		]);

		$sea = Article::find()
				->select('title,datetime,id,author,category,keyword,content')
				->where($whereStr)
				->orderBy(['datetime' => SORT_DESC])
				->offset($pagination->offset)
				->limit($pagination->limit)
				->all();
		//字典反转
		$category = Dictitem::find()->where(['dictCode'=>'DICT_ARTICLE_CATEGORY'])->all();
		foreach($sea as $key=>$data) {
			foreach ($category as $index => $value) {
				if ($data->category == $value->dictItemCode) {
					$sea[$key]->category = $value->dictItemName;
				}
			}
		}
		$para = [];
		$para['sea'] = Json::encode($sea);
		$para['page'] = $page;
		$para['pageSize'] = $pagination->defaultPageSize;//一页的条数
		$para['totalCount'] = $pagination->totalCount; //总条数
		return Json::encode($para);
	}
	/**
	 * 企业新闻页
	 * @return string
	 */
	public function actionCompanyNews(){
		$this->layout_data = '3';
		$companyId = Yii::$app->request->get('companyId');
		$company = Company::findOne($companyId);
		$companyName = $company->name;
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('companynews',[
			'companyId' => $companyId,
			'companyName'=>$companyName,
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 企业新闻详情页
	 * @return string
	 */
	public function actionNewsDetail(){
		$this->layout_data = '3';
		$newsId = Yii::$app->request->get('newsId');
		$companyId = Yii::$app->request->get('companyId');
		$company = Company::findOne($companyId);
		$companyNews = CompanyNews::findOne($newsId);
		$scompanyNews = CompanyNews::find()
				->orderBy(['published'=>SORT_ASC])
				->where('published>:time',[':time'=>$companyNews->published])
				->limit('0,1')
				->one();
		if(!is_null($scompanyNews)) {
			$sid = $scompanyNews->id;
			$stitle = $scompanyNews->title;
			$spublished = $scompanyNews->published;
		}else{
			$sid = '';
			$stitle = '';
			$spublished = '';
		}
		$companyNewss = CompanyNews::find()
				->orderBy(['published'=>SORT_DESC])
				->where('published<:time',[':time'=>$companyNews->published])
				->limit('0,1')
				->one();
		if(!is_null($companyNewss)) {
			$ids = $companyNewss->id;
			$titles = $companyNewss->title;
			$publisheds = $companyNewss->published;
		}else{
			$ids = '';
			$titles = '';
			$publisheds = '';
		}
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('newsdetail',[
				'companyNews' => $companyNews,
				'sid'=>$sid,
				'ids'=>$ids,
				'stitle'=>$stitle,
				'titles'=>$titles,
				'spublished'=>$spublished,
				'publisheds'=>$publisheds,
				'companyId'=>$companyId,
				'companyName'=>$company->name,
				'pic'=>$pic->url,
		]);
	}

	/**
	 * @return string
	 * 打开培训报名页面
	 */
	public function actionSignup(){
		$this->layout_data = '2';
		$trainId = Yii::$app->request->get('id');
		$pic = Pic::find()->where('category=9')->one();
		return $this->render('signup',[
			'trainId'=>$trainId,
			'pic'=>$pic->url,
		]);
	}
	/**
	 * @return string
	 * 培训报名
	 */
	public function actionSign(){
		$ectrainEnter = new EctrainEnter();
		$ectrainEnter->id = Common::create40ID();
		$ectrainEnter->truename = Yii::$app->request->post('name');
		$ectrainEnter->trainId = Yii::$app->request->post('trainId');
		$ectrainEnter->gender  = Yii::$app->request->post('gender');
		$ectrainEnter->age  = Yii::$app->request->post('age');
		$ectrainEnter->mobile  = Yii::$app->request->post('mobile');
		$ectrainEnter->address  = Yii::$app->request->post('address');
		$ectrainEnter->idCardNo  = Yii::$app->request->post('idCardNo');
		$ectrainEnter->state  = 0;
		$ectrainEnter->created = date('Y-m-d H:i:s');
		if($ectrainEnter->save()){
			return "success";
		}else{
			return "fail";
		}
	}

	/**
	 * 数据统计页
	 * @return string
	 */
	public function actionDataStatistic(){
		$this->layout_data = '6';
		$pic = Pic::find()->where('category=6')->one();
		return $this->render('statistic',[
			'pic'=>$pic->url,
		]);
	}

	/**
	 * 服务站点页
	 * @return string
	 */
	public function actionServiceSite(){
		$this->layout_data = '8';
		return $this->render('servicesite');
	}

	/**
	 * @return string
	 * 公司招聘列表页
	 */
	public function actionCompanyRecruit(){
		$companyId = Yii::$app->request->get('companyId');
		$recruit = Company::findOne($companyId);
		$pic = Pic::find()->where('category=10')->one();
		return $this->render('companyrecruit',[
			'companyId'=>$companyId,
			'companyName'=>$recruit->name,
			'pic'=>$pic->url,
		]);
	}
}
