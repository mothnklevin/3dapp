<?php
class ObModel{
    public $id;
    public $content;
    public function __construct($id, $content) {
        $this->id = $id;
        $this->content = $content;
    }
    public static function getAll() {
        try {
            # SQLite Database 
            $db = new PDO("sqlite:db/my.db");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->prepare("SELECT * FROM obejct_content order by id asc");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            // The SQL statement
            // $sql = <<<SQL
            // CREATE TABLE IF NOT EXISTS obejct_content(
            //     id INTEGER PRIMARY KEY AUTOINCREMENT,
            //     content TEXT NOT NULL
            // )
            // SQL;
            // // Run the statement
            // $db->exec($sql);
            // echo "Table created successfully";
        
            // 创建一个预处理语句  
            // $stmt = $db->prepare("INSERT INTO obejct_content (content) VALUES (:value1)");  
            
            // // 绑定参数  
            // $stmt->bindValue(':value1', "<h4 class='card-title'>3D Zero cola Brand Descriptions </h4><h6 class='card-subtitle'>by Robert gates on 8th June 2015 at 06:10 AM</h6><p>CocaCola Zero Sugar is the perfect drink for people who want all the taste of Coca‑Cola Original Taste, without the sugar or calories.</p><a href='https://www.coca-cola.com/gb/en/brands/coca-cola-zero-sugar' class='view-more text-left'>View More</a>");  
            
            // // 执行预处理语句  
            // $result = $stmt->execute();  
            
            // // 检查是否插入成功  
            // if ($result) {  
            //     echo "数据插入成功";  
            // } else {  
            //     echo "数据插入失败: " . $db->lastErrorMsg();  
            // }  
        
        
            
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>

