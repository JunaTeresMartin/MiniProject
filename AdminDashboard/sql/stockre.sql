CREATE TABLE stock_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  stock_item VARCHAR(100),
  
  quantity INT,
  defect_details VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
