<?php
if (isset($_REQUEST['allrecords'])) {
    $searchValue = isset($_POST['search']) ? trim($_POST['search']) : '';
    $fgender = isset($_POST['fgender']) ? trim($_POST['fgender']) : '';
    $fhobbies = isset($_POST['fhobbies']) ? trim($_POST['fhobbies']) : '';
    $field = isset($_POST['field']) ? $_POST['field'] : 'id';
    $sort = isset($_POST['sort']) ? $_POST['sort'] : 'asc';
    $limit = isset($_POST['limit']) ? (int) $_POST['limit'] : 5;
    $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;

    $allDataquery = "SELECT * FROM `usersdata`";
    $fetchall = mysqli_query($conn, $allDataquery);
    // filter query
    $search_condition = "(name LIKE '%$searchValue%' OR gender LIKE '$searchValue' OR gender LIKE '%$searchValue%')";
    $where = [];
    if (!empty($searchValue)){
        $where[] = $search_condition;
    }    
    if (!empty($fgender)){
        $where[] = "gender LIKE '%$fgender%'";
    }        
    if (!empty($fhobbies)){
        $where[] = "hobbies LIKE '$fhobbies'";
    }

    $where_sql = count($where) > 0 ? implode(" AND ", $where) : "1";
    $query = "SELECT * FROM employee WHERE $where_sql ORDER BY $column $order LIMIT $offset, $limit";
    $result = $conn->query($query);

    $count_query = "SELECT * FROM employee WHERE $where_sql";
    $total_res = $conn->query($count_query);
    $total_rows = $total_res->num_rows;
    $total_pages = ceil($total_rows / $limit);
}
?>