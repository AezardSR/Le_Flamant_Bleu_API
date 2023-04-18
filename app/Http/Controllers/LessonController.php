<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Modules;
use App\Models\Exercices;
use App\Models\Lesson;
use App\Models\Parts;
use App\Models\Categories;
use App\Models\ModulesCategories;
use App\Models\ModulesClass;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;


class LessonController extends Controller
{
    //Ajouter

    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *      path="/modules",
     *      operationId="addModule",
     *      tags={"Lesson"},

     *      summary="Ajouter un module",
     *      description="Ajouter un module",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="module",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "module":"Nom de module"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addModule(Request $request) {
        $module = new Modules();
        $module->moduleName = $request->input('module');
        $module->save();
        return response()->json($module);
    }

    /**
     * @OA\Post(
     *      path="/parts",
     *      operationId="addParts",
     *      tags={"Lesson"},

     *      summary="Ajouter une partie",
     *      description="Ajouter une partie",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="module",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="categories_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Nom de partie"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addParts(Request $request) {
        $parts = new Parts();
        $parts->name = $request->input('name');

        $parts->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;

        $parts->save();
        return response()->json($parts);
    }

    /**
     * @OA\Post(
     *      path="/lessons",
     *      operationId="addLesson",
     *      tags={"Lesson"},

     *      summary="Ajouter une leçon",
     *      description="Ajouter une leçon",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="content",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="duration",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="parts_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Nom du cours",
     *                     "content":"Contenu du cours",
     *                     "duration":"Nombre de jours",
     *                     "parts_id":"L'id de la partie liée",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addLesson(Request $request) {
        $lesson = new Classes();
        $lesson->name = $request->input('name');
        $lesson->content = $request->input('content');
        $lesson->duration = $request->input('duration');

        $lesson->parts_id = Parts::find(
            intval(
                $request->input('part_id')
            )
        )->id;

        $lesson->save();
        return response()->json($lesson);
    }

    /**
     * @OA\Post(
     *      path="/exercices",
     *      operationId="addExercice",
     *      tags={"Lesson"},

     *      summary="Ajouter un exercice",
     *      description="Ajouter un exercice",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="content",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="image",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="file",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="parts_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Nom de l'exercice",
     *                     "content":"Contenu de l'exercice",
     *                     "parts_id":"L'id de la partie liée"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addExercice(Request $request) {
        $exercice = new Exercices();
        $exercice->name = $request->input('name');
        $exercice->content = $request->input('content');
        $exercice->image = $request->input('image');
        $exercice->file = $request->input('file');

        $exercice->parts_id = Parts::find(
            intval(
                $request->input('part_id')
            )
        )->id;
        
        $exercice->save();
        return response()->json($exercice);
    }

    /**
     * @OA\Post(
     *      path="/categories",
     *      operationId="addCategories",
     *      tags={"Lesson"},

     *      summary="Ajouter une categorie",
     *      description="Ajouter une categorie",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="categorie",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "categorie":"Nom de la categorie",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addCategories(Request $request) {
        $categories = new Categories();
        $categories->categorie = $request->input('categorie');
        $categories->save();
        return response()->json($categories);
    }

    /**
     * @OA\Post(
     *      path="/module-categories",
     *      operationId="addModulesCategories",
     *      tags={"Lesson"},
     *
     *      summary="Lié une catégorie à un module",
     *      description="Lié une catégorie à un module",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="categories_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="modules_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "categories_id": 1,
     *                     "modules_id": 2
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addModulesCategories(Request $request) {
        $moduleCategorie = new ModulesCategories();

        $moduleCategorie->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;

        $moduleCategorie->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;
        
        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    /**
     * @OA\Post(
     *      path="/module-classes",
     *      operationId="addModulesClass",
     *      tags={"Lesson"},

     *      summary="Lié une leçon à un module",
     *      description="Lié une leçon à un module",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="classes_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="modules_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "classes_id": 1,
     *                     "modules_id": 2
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function addModulesClass(Request $request) {
        $moduleClasse = new ModulesClass();

        $moduleClasse->classes_id = Classes::find(
            intval(
                $request->input('classes_id')
            )
        )->id;

        $moduleClasse->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;

        $moduleClasse->save();
        return response()->json($moduleClasse);
    }

    //Supprimer
    /**
     * @OA\Delete (
     *      path="/modules/{id}",
     *      operationId="deleteModule",
     *      tags={"Lesson"},
     *      summary="Supprimer un module",
     *      description="Supprimer un module avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteModule($id) {
        $module = Modules::find($id);
        $module->delete();
    }

    /**
     * @OA\Delete (
     *      path="/parts/{id}",
     *      operationId="deleteParts",
     *      tags={"Lesson"},
     *      summary="Supprimer une partie",
     *      description="Supprimer une partie avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteParts($id) {
        $parts = Parts::find($id);
        $parts->delete();
    }

    /**
     * @OA\Delete (
     *      path="/lessons/{id}",
     *      operationId="deleteLesson",
     *      tags={"Lesson"},
     *      summary="Supprimer une leçons",
     *      description="Supprimer une leçons avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteLesson($id) {
        $lesson = Classes::find($id);
        $lesson->delete();
    }

    /**
     * @OA\Delete (
     *      path="/exercices/{id}",
     *      operationId="deleteExercice",
     *      tags={"Lesson"},
     *      summary="Supprimer un exercice",
     *      description="Supprimer un exercice avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteExercice($id) {
        $exercice = Exercices::find($id);
        $exercice->delete();
    }

    /**
     * @OA\Delete (
     *      path="/categories/{id}",
     *      operationId="deleteCategories",
     *      tags={"Lesson"},
     *      summary="Supprimer une catégorie",
     *      description="Supprimer une catégorie avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteCategories($id) {
        $categories = Categories::find($id);
        $categories->delete();
    }

    /**
     * @OA\Delete (
     *      path="/module-categories/{id}",
     *      operationId="deleteModulesCategories",
     *      tags={"Lesson"},
     *      summary="Supprimer un module de catégorie",
     *      description="Supprimer un module de catégorie avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteModulesCategories($id) {
        $moduleCategorie = ModulesCategories::find($id);
        $moduleCategorie->delete();
    }

    /**
     * @OA\Delete (
     *      path="/module-classes/{id}",
     *      operationId="deleteModulesClasses",
     *      tags={"Lesson"},
     *      summary="Supprimer un module de leçons",
     *      description="Supprimer un module de leçons avec son ID",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer"
     *      )
     *   ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function deleteModulesClasses($id) {
        $moduleClasses = ModulesClass::find($id);
        $moduleClasses->delete();
    }

    //Modifier

    /**
     * @OA\Patch (
     *      path="/modules/{id}",
     *      operationId="changeModule",
     *      tags={"Lesson"},
     *      summary="modifier un module",
     *      description="modifier un module",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="module",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "module": "Nouveau nom"
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeModule($id, Request $request) {
        $module = Modules::find($id);
        $module->moduleName = $request->input('module');
        $module->save();
        return response()->json($module);
    }

    /**
     * @OA\Patch (
     *      path="/parts/{id}",
     *      operationId="changeParts",
     *      tags={"Lesson"},
     *      summary="modifier une partie",
     *      description="modifier une partie",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="categories_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name": "Nouveau nom",
     *                     "categories_id": 1
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeParts($id, Request $request) {
        $parts = Parts::find($id);
        $parts->name = $request->input('name');
        $parts->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;
        $parts->save();
        return response()->json($parts);
    }

    /**
     * @OA\Patch (
     *      path="/lessons/{id}",
     *      operationId="changeLesson",
     *      tags={"Lesson"},
     *      summary="modifier une leçon",
     *      description="modifier une leçon",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="contenu",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="parts_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name": "Nouveau nom",
     *                     "contenu": "Nouveau contenu",
     *                     "parts_id": 1
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeLesson($id, Request $request) {
        $lesson = Classes::find($id);
        $lesson->name = $request->input('name');
        $lesson->contenu = $request->input('contenu');

        $lesson->parts_id = Parts::find(
            intval(
                $request->input('parts_id')
            )
        )->id;

        $lesson->save();
        return response()->json($lesson);
    }

    /**
     * @OA\Patch (
     *      path="/exercices/{id}",
     *      operationId="changeExercice",
     *      tags={"Lesson"},
     *      summary="modifier un exercice",
     *      description="modifier un exercice",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="contenu",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="parts_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "name": "Nouveau nom",
     *                     "contenu": "Nouveau contenu",
     *                     "parts_id": 1
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeExercice($id, Request $request) {
        $exercice = Exercices::find($id);
        $exercice->name = $request->input('name');
        $exercice->contenu = $request->input('contenu');

        $exercice->parts_id = Parts::find(
            intval(
                $request->input('parts_id')
            )
        )->id;

        $exercice->save();
        return response()->json($exercice);
    }

    /**
     * @OA\Patch (
     *      path="/categories/{id}",
     *      operationId="changeCategories",
     *      tags={"Lesson"},
     *      summary="modifier une catégorie",
     *      description="modifier une catégorie",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="categorie",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "categorie": "Nouveau nom"
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeCategories($id, Request $request) {
        $categories = Categories::find($id);
        $categories->categorie = $request->input('categorie');
        $categories->save();
        return response()->json($categories);
    }

    /**
     * @OA\Patch (
     *      path="/module-categories/{id}",
     *      operationId="changeModulesCategories",
     *      tags={"Lesson"},
     *      summary="modifier une liaison module - catégorie",
     *      description="modifier une liaison module - catégorie",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="categories_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="modules_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "categories_id":1,
     *                     "modules_id":2
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeModulesCategories($id, Request $request) {
        $moduleCategorie = ModulesCategories::find($id);

        $moduleCategorie->categories_id = Categories::find(
            intval(
                $request->input('categories_id')
            )
        )->id;

        $moduleCategorie->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;

        $moduleCategorie->save();
        return response()->json($moduleCategorie);
    }

    /**
     * @OA\Patch (
     *      path="/module-classes/{id}",
     *      operationId="changeModulesClass",
     *      tags={"Lesson"},
     *      summary="modifier une liaison module - leçon",
     *      description="modifier une liaison module - leçon",
     *     @OA\Parameter (
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema (
     *           type="integer",
     *      ),
     * ),
     *      *      @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="classes_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="modules_id",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "classes_id":1,
     *                     "modules_id":2
     *                }
     *             )
     *         )
     * ),
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
    */
    public function changeModulesClass($id, Request $request) {
        $moduleClasse = ModulesClass::find($id);

        $moduleClasse->classes_id = Classes::find(
            intval(
                $request->input('classes_id')
            )
        )->id;

        $moduleClasse->modules_id = Modules::find(
            intval(
                $request->input('modules_id')
            )
        )->id;

        $moduleClasse->save();
        return response()->json($moduleClasse);
    }


    //Get

     /**
     * @OA\Get(
     *      path="/modules",
     *      operationId="getModuleList",
     *      tags={"Lesson"},

     *      summary="Voir tous les modules",
     *      description="Voir tous les modules",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function getModuleList()
    {
        $module = Modules::all();
        return response()->json($module);
    }


     /**
     * @OA\Get(
     *      path="/part",
     *      operationId="getPartsList",
     *      tags={"Lesson"},

     *      summary="",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function getPartsList()
    {
        $parts = Parts::all();
        return response()->json($parts);
    }

    public function getOneParts($id)
    {
        $parts = Parts::find($id);
        return response()->json($parts);
    }

     /**
     * @OA\Get(
     *      path="/leçons",
     *      operationId="getLessonList",
     *      tags={"Lesson"},

     *      summary="",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function getLessonList()
    {
        $lesson = Classes::all();
        return response()->json($lesson);
    }

     /**
     * @OA\Get(
     *      path="/exercice",
     *      operationId="getExerciceList",
     *      tags={"Lesson"},

     *      summary="Liste des exercices",
     *      description="Liste des exercices",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */
    public function getExerciceList()
    {
        $exercice = Exercices::all();
        return response()->json($exercice);
    }

     /**
     * @OA\Get(
     *      path="/categories",
     *      operationId="getCategoriesList",
     *      tags={"Lesson"},

     *      summary="Liste des categories",
     *      description="Liste des categories",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */   
    public function getCategoriesList()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

    public function getOneCategories($id)
    {
        $categories = Categories::find($id);
        return response()->json($categories);
    }


     /**
     * @OA\Get(
     *      path="/modulescategories",
     *      operationId="getModulesCategoriesList",
     *      tags={"Lesson"},

     *      summary="Liste des modules categories",
     *      description="Liste des modules categories",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */ 
    public function getModulesCategoriesList()
    {
        $moduleCategorie = ModulesCategories::all();
        return response()->json($moduleCategorie);
    }


     /**
     * @OA\Get(
     *      path="/modulesclasses",
     *      operationId="getModulesClassesList",
     *      tags={"Lesson"},

     *      summary="Liste des modules de classes",
     *      description="Liste des modules de classes",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *  )
     */ 
    public function getModulesClassesList()
    {
        $moduleClasses = ModulesClass::all();
        return response()->json($moduleClasses);
    }

}
