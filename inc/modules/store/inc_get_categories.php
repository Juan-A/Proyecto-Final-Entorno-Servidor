<?
// Obtiene todas las categorías de la base de datos
function getAllCategories()
{
    $query = "SELECT * FROM db_shop_categories";
    $preQuery = db()->prepare($query);
    $preQuery->execute();

    return $preQuery->fetchAll(PDO::FETCH_ASSOC);
}
// Rellena el select de categorías con las categorías de la base de datos
// Si se le pasa un id, selecciona la categoría con ese id.
function fillCategorySelect($selected_id) {
    $categories = getAllCategories();
    $output = '';

    foreach ($categories as $category) {
        if ($category['var_is_subcategory'] == 0) {
            $output .= '<optgroup label="' . $category['var_category_name'] . '">';
            $selected = ($selected_id == $category['var_code']) ? ' selected' : '';
            $output .= '<option value="' . $category['var_code'] . '" ' . $selected . '>Todo de ' . $category['var_category_name'] . '</option>';
        }

        // Buscar subcategorías de la categoría actual
        foreach ($categories as $subcategory) {
            if ($subcategory['var_is_subcategory'] == 1 && $subcategory['var_parent_category'] == $category['var_code']) {
                $selected = ($selected_id == $subcategory['var_code']) ? ' selected' : '';
                $output .= '<option value="' . $subcategory['var_code'] . '"' . $selected . '>&nbsp;&nbsp;&nbsp;&nbsp;' . $subcategory['var_category_name'] . '</option>';
            }
        }

        if ($category['var_is_subcategory'] == 0) {
            $output .= '</optgroup>';
        }
    }

    return $output;
}
// Funcion recursiva para obtener las subcategorías de una categoría
function getSubcategories($parent_id, $categories) {
    $subcategories = [];

    foreach ($categories as $category) {
        if ($category['var_parent_category'] == $parent_id) {
            $subcategories[] = $category;
            $subcategories = array_merge($subcategories, getSubcategories($category['var_code'], $categories));
        }
    }

    return $subcategories;
}