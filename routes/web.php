<?php

use App\Http\Controllers\Pagecontroller;
use Illuminate\Support\Facades\Route;
use App\Models\Inscription;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/fiche',function(){
    $code ="KOJI0VNU";
    $etu=Inscription::where('code',$code)->first();
    return view('web.pdf',compact('etu'));
});

Auth::routes();
Route::get('/',[Pagecontroller::class,'Index'])->name('Index');
Route::get('/a-propos',[Pagecontroller::class,'Apropos'])->name('Apropos');
Route::get('/annuaire',[Pagecontroller::class,'Annuaire'])->name('Annuaire');
Route::get('/partenaires',[Pagecontroller::class,'Partenaires'])->name('Partenaires');
Route::get('/activites',[Pagecontroller::class,'Activites'])->name('Activites');
Route::get('/faq',[Pagecontroller::class,'Faq'])->name('faq');
Route::get('/activites/{slug}',[Pagecontroller::class,'Activite'])->name('Activite');
Route::get('/carrieres',[Pagecontroller::class,'Carrieres'])->name('Carrieres');
Route::get('/opportunites',[Pagecontroller::class,'Opportunites'])->name('Opportunites');
Route::get('/contact',[Pagecontroller::class,'Contact'])->name('Contact');
Route::get('/locale/{lang}',[Pagecontroller::class,'SetLang'])->name('lang');
//{{ url('/locale/lv') }}
/*
Route::get('/a-propos',[Pagecontroller::class,'Apropos'])->name('Apropos');
Route::get('/inscription',[Pagecontroller::class,'Inscription'])->name('inscription');
Route::get('/inscription/fiche',[Pagecontroller::class,'Fiche'])->name('fiche');
Route::post('/inscription',[Pagecontroller::class,'Sinscrire'])->name('sinscrire');
Route::get('/site-de-parakou',[Pagecontroller::class,'SiteParakou'])->name('siteParakou');
Route::get('/site-de-cotonou',[Pagecontroller::class,'SiteCotonou'])->name('siteCotonou');
Route::get('/formations',[Pagecontroller::class,'Formations'])->name('formations');
Route::get('/membres-administratifs',[Pagecontroller::class,'Membres'])->name('membres-administratifs');
Route::get('/membres-administratif-{id}.html',[Pagecontroller::class,'Membre'])->name('membre');
Route::get('/communiques',[Pagecontroller::class,'Communiques'])->name('communiques');
Route::get('/communique/{slug}.html',[Pagecontroller::class,'Communique'])->name('communique');
Route::get('/galerie-images',[Pagecontroller::class,'GImages'])->name('galerie-images');
Route::get('/galerie-videos',[Pagecontroller::class,'GVideos'])->name('galerie-videos');
Route::get('/galerie-video-{id}.html',[Pagecontroller::class,'GVideo'])->name('galerie-video');
Route::get('/fichiers-a-telecharger',[Pagecontroller::class,'Fichiers'])->name('fichiers-a-telecharger');
Route::get('/fichiers-{id}.html',[Pagecontroller::class,'Fichier'])->name('fichier');
Route::get('/formation/{id}.html',[Pagecontroller::class,'Formation'])->name('formation');
Route::get('/activites',[Pagecontroller::class,'Activites'])->name('activites');
Route::get('/evenements',[Pagecontroller::class,'Evenements'])->name('evenements');
Route::get('/evenement/{slug}.html',[Pagecontroller::class,'Evenement'])->name('evenement');
Route::get('/activite/{slug}.html',[Pagecontroller::class,'Activite'])->name('activite');
Route::get('/page/{slug}.html',[Pagecontroller::class,'Page'])->name('page');
Route::get('/enseignants',[Pagecontroller::class,'Enseignants'])->name('enseignants');
Route::get('/enseignant/{slug}.html',[Pagecontroller::class,'Enseignant'])->name('enseignant');
Route::get('/parteanires',[Pagecontroller::class,'Parteanires'])->name('parteanires');
Route::get('/parteanire/{slug}.html',[Pagecontroller::class,'Parteanire'])->name('parteanire');
Route::get('/categories',[Pagecontroller::class,'Categories'])->name('categories');
Route::get('/categorie/{slug}.html',[Pagecontroller::class,'Categorie'])->name('categorie');

Route::get('/contact',[Pagecontroller::class,'Contact'])->name('contact');

Auth::routes();

*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/profil', [App\Http\Controllers\Pagecontroller::class, 'Profil'])->name('profil');
Route::get('/@{username}', [App\Http\Controllers\Pagecontroller::class, 'ProfilUser'])->name('uprofil');
Route::get('/search', [App\Http\Controllers\Pagecontroller::class, 'Search'])->name('search');
#Route::post('/contact', [App\Http\Controllers\Pagecontroller::class, 'contacter'])->name('contacter');
Route::post('/contact',[App\Http\Controllers\Pagecontroller::class,'postContact'])->name('pcontact');
Route::get('/enregistrement', [App\Http\Controllers\HomeController::class, 'Enregistrement'])->name('enregistrement');
Route::get('/enregistrement/etape-1', [App\Http\Controllers\HomeController::class, 'Enregistrement1'])->name('enregistrement1');
Route::post('/enregistrement/etape-1', [App\Http\Controllers\HomeController::class, 'SaveEnregistrement1'])->name('save_enregistrement1');
Route::get('/enregistrement/etape-2', [App\Http\Controllers\HomeController::class, 'Enregistrement2'])->name('enregistrement2');
Route::post('/enregistrement/etape-2', [App\Http\Controllers\HomeController::class, 'SaveEnregistrement2'])->name('save_enregistrement2');
Route::get('/enregistrement/etape-3', [App\Http\Controllers\HomeController::class, 'Enregistrement3'])->name('enregistrement3');
Route::post('/enregistrement/etape-3', [App\Http\Controllers\HomeController::class, 'SaveEnregistrement3'])->name('save_enregistrement3');

Route::get('admin', 'App\Http\Controllers\Admin\AdminController@index');
Route::resource('admin/roles', 'App\Http\Controllers\Admin\RolesController');
Route::resource('admin/permissions', 'App\Http\Controllers\Admin\PermissionsController');
Route::resource('admin/users', 'App\Http\Controllers\Admin\UsersController');
Route::resource('admin/pages', 'App\Http\Controllers\Admin\PagesController');
Route::resource('admin/activitylogs', 'App\Http\Controllers\Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'App\Http\Controllers\Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
Route::resource('admin/activite','App\Http\Controllers\Admin\ActiviteController');
Route::resource('admin/categorie','App\Http\Controllers\Admin\CategorieController');
Route::resource('admin/communique','App\Http\Controllers\Admin\CommuniqueController');
Route::resource('admin/slide','App\Http\Controllers\Admin\SlideController');
Route::resource('admin/formation','App\Http\Controllers\Admin\FormationController');
Route::resource('admin/galerie-image','App\Http\Controllers\Admin\GalerieImageController');
#Route::resource('admin/galerie-video','App\Http\Controllers\Admin\GalerieVideoController');
#Route::resource('admin/membre','App\Http\Controllers\Admin\MembreController');
#Route::resource('admin/evenement','App\Http\Controllers\Admin\EvenementController');
Route::resource('admin/enseignant','App\Http\Controllers\Admin\EnseignantController');
Route::resource('admin/message','App\Http\Controllers\Admin\MessageController');
Route::resource('admin/fichier','App\Http\Controllers\Admin\FichierController');
Route::resource('admin/avis','App\Http\Controllers\Admin\AvisController');
Route::resource('admin/partenaire','App\Http\Controllers\Admin\PartenaireController');
Route::resource('admin/inscription','App\Http\Controllers\Admin\InscriptionController');
Route::resource('admin/entite','App\Http\Controllers\Admin\EntiteController');
Route::resource('admin/filiere','App\Http\Controllers\Admin\FiliereController');
Route::resource('admin/secteur','App\Http\Controllers\Admin\SecteurController');

/*
user#belongsTo#App\Models\User
CATEGORIE ARTICLE
-nom
-slug
-description
-user_id
ACTIVITES
-site
-titre
-slug
-image
-view_count
-resume
-contenu
-actif
-categorie_id
-user_id
PAGES
-titre
-slug
-contenu
-user_id
COMMUNIQUE
-site
-titre
-slug
-contenu
-etat
-user_id
SLIDES
-titre
-slug
-sous_titre
-image
-description
-etat
-user_id
FORMATION
-site
-titre
-image
-conditions
-description
-débouchés
-etat
-user_id
GALERIE IMAGE
-site
-titre
-slug
-image
-description
-etat
-user_id
GALERIE VIDEO
-site
-titre
-slug
-url_video_youtube
-description
-etat
-user_id

MEMBRE
-site
-nom
-prenom
-sexe
-poste
-photo
-email
-telephone
-biographie
-lien_facebook
-lien_linkedin
-etat
-user_id

ENSEIGNANT
-site
-nom
-prenom
-sexe
-specialite
-ecole
-poste
-email
-telephone
-lien_facebook
-lien_linkedin
-photo
-biographie
-user_id

FICHIERS
-site
-titre
-slug 
-fichier
-format
-etat
-user_id


EVENEMENTS
-site
-nom
-photo
-description
-date
-lieu
-conditions
-user_id
MESSAGE
-site
-nom
-email
-objet
-message
-autres
-user_id


Route::resource('admin/test6', 'Admin\Test6Controller');
Route::resource('admin/test5', 'Admin\Test5Controller');
Route::resource('admin/test7', 'Admin\Test7Controller');
Route::resource('admin/test8', 'Admin\Test8Controller');
Route::resource('admin/test9', 'Admin\Test9Controller');
Route::resource('admin/café', 'Admin\CaféController');
Route::resource('admin/categorie', 'Admin\CategorieController');
Route::resource('admin/activite', 'Admin\ActiviteController');
Route::resource('admin/activite', 'Admin\ActiviteController');
Route::resource('admin/activite', 'Admin\ActiviteController');
Route::resource('admin/test', 'Admin\TestController');
Route::resource('admin/test1', 'Admin\Test1Controller');
Route::resource('admin/test2', 'Admin\Test2Controller');
Route::resource('admin/test3', 'Admin\Test3Controller');
Route::resource('admin/test4', 'Admin\Test4Controller');
Route::resource('admin/test5', 'Admin\Test5Controller');
Route::resource('admin/communique', 'Admin\CommuniqueController');
Route::resource('admin/slide', 'Admin\SlideController');
Route::resource('admin/formation', 'Admin\FormationController');
Route::resource('admin/galerie-video', 'Admin\GalerieVideoController');
Route::resource('admin/fichier', 'Admin\FichierController');
Route::resource('admin/enseignant', 'Admin\EnseignantController');
Route::resource('admin/evenement', 'Admin\EvenementController');
Route::resource('admin/message', 'Admin\MessageController');
Route::resource('admin/avis', 'Admin\AvisController');
Route::resource('admin/partenaire', 'Admin\PartenaireController');
Route::resource('admin/inscription', 'Admin\inscriptionController');
Route::resource('admin/inscription', 'Admin\inscriptionController');
Route::resource('admin/entite', 'Admin\EntiteController');
Route::resource('admin/filiere', 'Admin\FiliereController');
Route::resource('admin/secteur', 'Admin\SecteurController');
*/