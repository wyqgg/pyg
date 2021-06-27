<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021000117644238",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAwKZNVmS0LeOuVsFcaux/8fdNxgsQEFT/D1nciOWhjbXrlEeUTiS+ixIjVe/IXMAy4GHvjHFfZ+DSO6wiz/j4JX1mhEkhZrSpOaM3NOjrGbpWEe2T7b0qebw4uheBwieh2A6u50MIIoXmdu0Ltgwt4uBi4JcbIxu7AwQ1ywsDyD+ta6/u8TGQZJE5ysS+ZCAXFzuWn8+GE87zTRJV+0Koa4+LTKztpo1VtzMyeWR6h+19bTAn6ROe1S8Qi1UnHMPwoDgwds4p+TjFyv0AP/JyVM1/uomehhMLLw4SgOWoEk2qYcbQSrDJenROtqXxTvirKiozxMiuWV9LfDphqtlnLwIDAQABAoIBAQCUmnODldCqqTsc7rCURfP3uLUEdBojDv1kYQPNkZxJzK94xLIwiQV2Dzq0mm7qpNNZ5BG9OuLGJVTl9MUxubHocU+38RVTvT3gGPeH17cqNGMaFzIJq+Zs2vTDD0jndFzSZZkjCMDoqHL6/6UN+10V6dI7vjOPpF9gV0oLYma7epR0mShkQKLWLHhSKdbHDFF6HsXShV7Ajw8nzJkrWIznJgw3caOkSTIeDXPiwumF/E8p00o8BwN2CTgQoSv5rjyeCtcFzk+Pz+nLYMRI9R1mmv9ry2SZOSadMYiLl9rRTBbd5wyoBz92ja10CIex+3N5p5dgH2UJlyRSzE6+GDi5AoGBAN9JQeSYgwvuYHI8yE6C6SqpGGz8ct8+ftAV/5boACoP6XBmLBQ3ov1PXdqzgEh3y6xUfrNk2pIipeq1obLwcDc7r3Njvgp+FXisMmZ7B/07Hzwh/10O61DVF8f8Zc3+Pf9oRbzg5F91tmL3QuL42sMoVICdhSp0k37m39Tcg6fNAoGBANzf94chmHAe3t3vLGSxpy3yKNB5lUAkEwL1TaftkeK2cQCQrfQyZDK5IgRff5z0S9JkZHtuq1OEX758CWgtY7B/ubeY1jbgQ28slTe/NOqjEeNI63t9mQz/xD1qmFbZa69Rz3516sfIzw6yGBMo554y7gmGuekZAo/FLg9jndbrAoGAJBO1FtdhjSL16F9TygOy4taxgKKFePajDMIRKvPPWvx5LlUD2DxpFF6nfne0SYE5ol2An0GzYxtADZ1NRBk/OF1natB52z4l//pqpk5IqyzLTi78ELAha00S65gnZtImeEcDxZHctGPTlUf4Qa4NwqyYgrNw2bw+PKnXDpCWoR0CgYAGk0hMJoziMZkS5E7fBIbkkEP0yNnPmgNS4DiamjDwndvJV4VGMsXW2LoRhUJISuGC9ugi4I2LI/KxugGRr2A7XeIKfCtMYOrBAYPDsBaEMayTppUUDQ4kW+zcozK7yycwhe/2ZM5Dek/nsReUYnBavktlzzPzo4H3A7i2TpHhVwKBgH24OnvIOkLD2PWFn+XjAAbTBQO9oNsw+WK6qdY7tGy5dmBRCtTd0MH2kYf3somnDRRvXjjXSentslZWUhUFrZUCqBELdYT39lqpoEXQa+q1OE5ZCuXGZpTXheyrA3rq1jlPwB04C5hfVmxypjICzxUenykZF0Ei6Q/e7J5qcI9q",
		
		//异步通知地址
		'notify_url' => "http://8.131.95.189/home/order/notify",
		
		//同步跳转
		'return_url' => "http://8.131.95.189/home/order/callback",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA7Rfee9KNLI0gYsxlwOHYA9zFPFLpt8nfdYaIc5bwQbzfVx5AuQKyfl00etlfkX53K6GDEINaje0lj69O3CdAOdeXAsBsSLmUA1bhAF5ufxwQROuva/okL/rTQf80NDCrzHYb0Lqswh4bkH4A43Kb93x9RnPxmK9Rc5Z41ZoIGd0xDqCI+m4SL+Fjq3JkTgPTxpkVDH2hYVQfu5No/ZO/9FJqJX7WOJTzFaqadBmrohuSf+mDxyCGvanP4CKiz/DVh40pvk9na4/7xjqJVsW4n4yO+Q3nBE07X5NdfIM9u40vd3saxuxMe4LXrMyk6FpnVu3jhHm0z89cPqNGN6HDLQIDAQAB",
);