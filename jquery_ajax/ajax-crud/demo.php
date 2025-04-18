<?php
//-------------------->> Show Data, Searching, Sorting, Filteration, Pagination <<---------------------//

if (isset($_POST['filter'])) {
    $value = isset($_POST['keywords']) ? trim($_POST['keywords']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $language = isset($_POST['language']) ? trim($_POST['language']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $limit = isset($_POST['limit']) ? (int) $_POST['limit'] : 5;
    $column = isset($_POST['column']) ? $_POST['column'] : 'id';
    $order = isset($_POST['order']) ? $_POST['order'] : 'asc';

    $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
    $offset = ($page - 1) * $limit;
    $search_condition = "(name LIKE '%$value%' OR email LIKE '%$value%' OR gender LIKE '$value' OR language LIKE '%$value%' OR city LIKE '%$value%')";
    $where = [];

    if (!empty($value))
        $where[] = $search_condition;
    if (!empty($city))
        $where[] = "city LIKE '%$city%'";
    if (!empty($gender))
        $where[] = "gender LIKE '$gender'";
    if (!empty($language))
        $where[] = "language LIKE '%$language%'";

    $where_sql = count($where) > 0 ? implode(" AND ", $where) : "1";

    $query = "SELECT * FROM employee WHERE $where_sql ORDER BY $column $order LIMIT $offset, $limit";
    $res = $conn->query($query);

    $count_query = "SELECT * FROM employee WHERE $where_sql";
    $total_res = $conn->query($count_query);
    $total_rows = $total_res->num_rows;
    $total_pages = ceil($total_rows / $limit);

    $page = $page > $total_pages ? $total_pages : $page;

    $next_order = $order === 'asc' ? 'desc' : 'asc';

    $output = "<table border='1' cellspacing='0' cellpadding='6' class='table table-responsive border border-dark'>";
    $output .= "<tr class='text-center'>
        <th style= 'border:1px solid;'>No.</th>
        <th  class='column' id='name' value='$page' data-order='$next_order'>Name</th>
        <th style= 'border:1px solid;' class='column' id='email' value='$page' data-order='$next_order'>Email</th>
        <th style= 'border:1px solid;' class='column' id='gender' value='$page' data-order='$next_order'>Gender</th>
        <th style= 'border:1px solid;' class='column' id='language' value='$page' data-order='$next_order'>Language</th>
        <th style= 'border:1px solid;' class='column' id='city' value='$page' data-order='$next_order'>City</th>
        <th style= 'border:1px solid;'>Image</th>
        <th style= 'border:1px solid;'>Action</th>
    </tr>";

    if ($res->num_rows > 0) {
        $i = $offset + 1;
        while ($data = $res->fetch_object()) {
            $output .= "<tr'>
                <td style= 'border:1px solid;'>$i</td>
                <td style= 'border:1px solid;'>$data->name</td>
                <td style= 'border:1px solid;'>$data->email</td>
                <td style= 'border:1px solid;'>$data->gender</td>
                <td style= 'border:1px solid;'>$data->language</td>
                <td style= 'border:1px solid;'>$data->city</td>
                <td style= 'border:1px solid;'><img src='image/$data->image'; height='40px' width='60px'></td>
                <td style= 'border:1px solid;'>
                    <a class='btn btn-success' onclick='editUser($data->id, $page, $limit)'>Edit</a>
                    <a class='btn btn-danger' onclick='deleteUser($data->id, $page, $limit)'>Delete</a>
                </td>
            </tr>";
            $i++;
        }
        $output .= "</table>";

        // PAGINATION SECTION
        $pagination = "<div class='pagination-wrapper' style='margin-top: 15px; text-align: center;'>";
        $pagination .= "<ul class='pagination' style='list-style: none; padding: 0; display: inline-flex;'>";

        $order = $next_order === 'asc' ? 'desc' : 'asc';

        if ($page >= 2) {
            $pagination .= "<li 
                class='page-btn' 
                style='margin: 0 5px; padding: 6px 12px; border: 1px solid black; border-radius: 5px; cursor: pointer; '
                onclick='searchFilter($page-1,$limit, `$column`, `$order`)'
            ><i class='fa-solid fa-backward'></i></li>";
        }
        for ($p = 1; $p <= $total_pages; $p++) {
            $activeStyle = ($p == $page) ? "background-color: deepskyblue; color: white;" : "background-color: white;";
            $pagination .= "<li 
                class='page-btn' 
                style='margin: 0 5px; padding: 6px 12px; border: 1px solid black; border-radius: 5px; cursor: pointer; $activeStyle'
                onclick='searchFilter($p, $limit, `$column`, `$order`)'
            >$p</li>";

        }

        if ($page < $total_pages) {

            $pagination .= "<li 
                class='page-btn'
                style='margin: 0 5px; padding: 6px 12px; border: 1px solid black; border-radius: 5px; cursor: pointer;'
                onclick='searchFilter($page+1, $limit, `$column`, `$order`)'
            ><i class='fa-solid fa-forward'></i></li>";
        }


        $pagination .= "</ul>";
        $pagination .= "</div>";

        echo json_encode([
            'table' => $output,
            'pagination' => $pagination,
            'page' => $page
        ]);

    } else {
        $output .= "<tr><td colspan='7' class='text-center'>No Data Found</td></tr></table>";
        echo json_encode([
            'table' => $output,
            'pagination' => ""
        ]);
    }
}
?>