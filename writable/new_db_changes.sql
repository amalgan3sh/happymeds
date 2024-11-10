-- Reset Password 
ALTER TABLE users ADD COLUMN reset_token  varchar(1000) NOT NULL;