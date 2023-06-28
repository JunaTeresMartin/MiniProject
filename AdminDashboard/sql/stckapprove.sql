CREATE TABLE stock_approval (
  id INT PRIMARY KEY AUTO_INCREMENT,
  
  stock_item VARCHAR(50) NOT NULL,

  quantity INT NOT NULL,
  defect_details VARCHAR(255),
  approval_status VARCHAR(20) NOT NULL DEFAULT 'pending'
);