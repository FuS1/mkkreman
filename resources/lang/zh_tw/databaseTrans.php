<?php

return [
    'sale'=>[
        'sale_id'           => '序號',
        'sale_code2'        => '代碼',
        'sale_code6'        => '編號',
        'sale_name'         => '姓名',
        'sale_tel'          => '聯絡電話',
        'sale_mobile_tel'   => '手機號碼',
        'sale_fax'          => '傳真',
        'sale_email'        => 'email',
        'source_type'       => '來源',
        'company_type'      => '通路',
        'saleBirthDate'     => '生日',
        'sale_city'         => '通訊地址_縣市',
        'sale_dist'         => '通訊地址_鄉鎮市區',
        'sale_zipcode'      => '通訊地址_郵遞區號',
        'sale_addr'         => '通訊地址_詳細地址',
        'sale_note'         => '貼心備註',
        'line_user_id'      => 'line綁定',
        'vol_pct'           => '任意險佣金趴數',
        'tf_pct'            => '颱洪險佣金趴數',
        'cps'               => '強制險佣金',
    ],
    'bonus'=>[
        'id'                => '流水號',
        'buuid'             => '獎金編號',
        'sale_id'           => '業務員',
        'total'             => '金額',
        'payDate'           => '發放日',
        'content'           => '備註',
        'is_lock'           => '是否鎖定',
        'isFCM'             => '是否推播',
    ],
    'bonusTax'=>[
        'id'                => '流水號',
        'bonus_id'          => '所屬獎金包',
        'title'             => '項目名稱',
        'money'             => '金額',
        'memo'              => '備註',
    ],
    'inquiry'=>[
        'inquiry_id'        => '詢價單流水號',
        'inquiry_uuid'      => '詢價單系統編號',
        'insured_name'      => '被保人',
        'insured_id'        => '被保人證號',
        'job_intro'         => '被保人職業說明',
        'insuredBirthDate'  => '被保人生日',
        'insured_city'      => '被保人地址-縣市',
        'insured_dist'      => '被保人地址-區',
        'insured_zipcode'   => '被保人地址-郵遞區號',
        'insured_addr'      => '被保人地址',
        'insured_files'     => '被保人檔案',
        'car_uuid'          => '車籍系統編號(已作廢)',
        'car_code8'         => '車籍-車型代碼',
        'car_brand'         => '車籍-廠牌',
        'car_model'         => '車籍-車型',
        'car_eng_disp'      => '車籍-排氣量',
        'car_listing'       => '車籍-是否已掛牌(已作廢)',
        'car_plate_number'  => '車籍-牌照號碼',
        'car_year'          => '車籍-出廠年份',
        'car_licenses'      => '車籍-原發照日期',
        'car_price'         => '車籍-重置價格',
        'car_type'          => '車籍-車輛種類',
        'car_eng_id'        => '車籍-引擎代碼',
        'car_body_id'       => '車籍-車身代碼',
        'car_files'         => '車籍-檔案',
        'insurance_item'    => '保險項目(已作廢)',
        'inquiry_content'   => '寄信備註(已作廢)',
        'inquiry_state'     => '詢價單狀態',
        'reply_type'        => '寄信類型(已作廢)',
        'creator'           => '建立人',
        'createFrom'        => '建檔來自',
        'createDate'        => '建立時間',
        'updDate'           => '最後編輯時間',
        'inquiry_reject'    => '未成交原因',
        'inquiry_company'   => '成交保險公司',
        'insurance_uuid'    => '成交後成立的保單編號(已作廢)',
        'source_type'       => '成交者(來源)',
        'company_type'      => '成交者(通路)',
        'sale_id'           => '成交者(業代)',
        'introducer'        => '介紹人',
        'files'             => '寄件附件(已作廢)',
        'scsJson'           => '詢價者'
    ],
    'inquiryUser'=>[
        'inquiry_user_id'   => '使用人流水號',
        'inquiry_uuid'      => '詢價單系統編號',
        'user_id'           => '使用人證號',
        'user_name'         => '使用人姓名',
        'userBirthDate'     => '使用人生日',
        'user_files'        => '使用人檔案',
        'createDate'        => '建立時間',
        'updDate'           => '最後編輯時間'
    ],
    'inquiryItem'=>[
        'id'                => '詢價項目流水號',
        'inquiry_uuid'      => '詢價單系統編號',
        'insurance_item_id' => '保險項目編號',
        'item_person_price' => '自負額',
        'item_price_1'      => '保額一',
        'item_price_2'      => '保額二'
    ],
    'inquiryMail'=>[
        'inquiry_mail_id'   => '詢價信件流水號',
        'inquiry_uuid'      => '詢價單系統編號',
        'mail_type'         => '信件類型',
        'mail_date'         => '寄件時間',
        'mail_title'        => '信件主旨',
        'mail_memo'         => '信件內文',
        'mail_sender'       => '發送者',
        'mail_recipient'    => '收件者',
        'mail_duplicate'    => '副本',
        'mail_company'      => '密件副本'
    ],
    'inquiryReply'=>[
        'reply_id'          => '詢價回覆流水號',
        'inquiry_uuid'      => '詢價單系統編號',
        'company_id'        => '回覆保險公司',
        'reply_price'       => '報價金額',
        'reply_file'        => '回覆附檔檔案',
        'reply_file_name'   => '回覆附檔檔名',
        'reply_reject'      => '拒保原因',
        'reply_intro'       => '補充說明',
        'reply_state'       => '是否可承保',
        'reply_content'     => '已作廢，以inquiry_mail為準',
        'reply_time'        => '回覆時間',
        'reply_type'        => '已作廢，以inquiry_mail為準',
        'reply_hour'        => '已作廢，以inquiry_mail為準',
        'reply_title'       => '已作廢，以inquiry_mail為準'
    ],
    'inquiryChk'=>[
        'id'                => '確認單流水號',
        'inquiry_uuid'      => '詢價單系統編號',
        'inquiry_reply_id'  => '所屬詢價回覆編號',
        'company_id'        => '所屬保險公司',
        'state'             => '回覆可否承保',
        'files'             => '附帶檔案',
        'price'             => '金額',
        'intro'             => '說明',
        'updUserId'         => '最後更新人',
        'updDate'           => '最後更新時間',
        'creator'           => '建立人'
    ],
    'inquiryScs'=>[
        'id'                => '詢價單來源流水號',
        'inquiry_uuid'      => '所屬詢價單',
        'source_type'       => '來源',
        'company_type'      => '通路',
        'sale_id'           => '業代',
    ],
    'insuranceType'=>[
        'insurance_type_id' => '保險種類流水號',
        'type_name'         => '保險種類名稱',
    ],
    'insuranceItem'=>[
        'insurance_item_id'     => '保險項目流水號',
        'insurance_type_id'     => '保險種類編號',
        'insurance_item_type'   => '保險種類子分類',
        'item_name'             => '保險項目名稱',
        'price_1_unit'          => '保額一單位',
        'price_1_unit_str'      => '保額一單位文字',
        'price_2_unit'          => '保額二單位',
        'price_2_unit_str'      => '保額二單位文字',
    ],
    'insurance'=>[
        'insurance_id'      => '保單流水號',
        'insurance_uuid'    => '保單系統編號',
        'car_uuid'          => '車籍系統編號',
        'parent_uuid'       => '前一保單系統編號',
        'inquiry_uuid'      => '詢價單編號',
        'insurance_number'  => '保單/強制證號碼',
        'insured_id'        => '被保人證號',
        'insured_name'      => '被保人名',
        'insured_car_type'  => '被保人車輛類型',
        'insuredBirthDate'  => '被保人生日',
        'insured_tel'       => '被保人聯絡電話',
        'insured_city'      => '被保人地址-縣市',
        'insured_dist'      => '被保人地址-區',
        'insured_zipcode'   => '被保人地址-郵遞區號',
        'insured_addr'      => '被保人地址',
        'insurer_id'        => '要保人證號',
        'insurer_name'      => '要保人名',
        'insurer_relation'  => '要保人與被保人關係',
        'insurerBirthDate'  => '要保人生日',
        'insurer_tel'       => '要保人聯絡電話',
        'insurer_city'      => '要保人地址-縣市',
        'insurer_dist'      => '要保人地址-區',
        'insurer_zipcode'   => '要保人地址-郵遞區號',
        'insurer_addr'      => '要保人地址',
        'insurance_company' => '承保保險公司',
        'beneficiary'       => '抵押權人/受益人',
        'insuranceStartDate'=> '保險起始時間',
        'insuranceEndDate'  => '保險結束時間',
        'insuranceDuringYear' => '保險年期(已作廢)',
        'licenseDate'       => '車籍-原發照日期',
        'car_year'          => '車籍-出廠年份',
        'car_code8'         => '車籍-車型代碼',
        'car_brand'         => '車籍-廠牌',
        'car_model'         => '車籍-車型',
        'car_price'         => '車籍-重置價格',
        'car_plate_number'  => '車籍-牌照號碼',
        'car_type'          => '車籍-車輛種類',
        'car_eng_disp'      => '排氣量',
        'car_eng_id'        => '引擎代碼',
        'car_body_id'       => '車身代碼',
        'insurance_item'    => '保險項目(已作廢)',
        'total_premium'     => '總保費',
        'vol_premium'       => '任意險保費',
        'tf_premium'        => '颱洪險保費',
        'cps_premium'       => '強制險保費',
        'paidup_premium'    => '實收保費',
        'next_premium'      => '續保保費',
        'insurance_new'     => '是否為續保件',
        'insurance_note'    => '貼心注意事項',
        'source_type'       => '來源碼',
        'company_type'      => '通路碼',
        'sale_id'           => '業代碼',
        'introducer'        => '介紹人',
        'commission_percent'=> '傭金趴數(即將作廢)',
        'commission'        => '傭金(即將作廢)',
        'ads_array'         => '廣告類型(已作廢)',
        'creator'           => '建立人',
        'createDate'        => '建立時間',
        'updUserId'         => '最後編輯人',
        'updDate'           => '最後編輯時間',
        'state'             => '保單狀態',
        'mail_time'         => '寄件時間累增(已作廢)',
        'insurance_files'   => '保單附檔',
        'app_files'         => '保單附檔(APP)',
        'is_edit'           => '是否可變更KeyMan',
        'condRecord'        => '未知功用',
        'insurance_category'=> '險種',
        'state'             => '保單狀態',
        'is_show'           => '是否顯示於官網',
        'is_reply'          => '保險公司是否已回覆',
        'error_point'       => '保單錯誤點'
    ],
    'insuranceUser'=>[
        'insurance_user_id' => '保險項目系統編號',
        'insurance_uuid'    => '保單系統編號',
        'user_id'           => '使用人證號',
        'user_name'         => '使用人姓名',
        'user_relation'     => '與被保險人關係',
        'user_relation_other'=> '與被保險人關係-其他欄位',
        'userBirthDate'     => '使用人生日',
        'user_tel'          => '使用人電話',
        'user_company'      => '使用人任職公司',
        'user_job'          => '使用人職稱',
        'user_email'        => '使用人Email',
        'user_files'        => '使用人檔案'
    ],
    'insuranceClaim'=>[
        'insurance_uuid'    => '保單系統編號',
        'insurance_number'  => '保單/強制證號碼',
        'insured_relation'  => '與被保人關係',
        'insured_relation_other'=> '與被保險人關係-其他欄位',
        'driver_name'       => '駕駛人名稱',
        'driver_id'         => '駕駛人證號',
        'driver_birth'      => '駕駛人生日',
        'driver_tel'        => '駕駛人電話',
        'claim_date'        => '出險日期',
        'body_price'        => '車體金額',
        'theft_price'       => '竊盜金額',
        'injury3_price'     => '第三人體傷金額',
        'deaths3_price'     => '第三人死亡金額',
        'financial3_price'  => '第三人財損金額',
        'injury2_price'     => '乘客體傷金額',
        'death2_price'      => '乘客死亡金額',
        'forced_price'      => '強制金額',
        'other_price'       => '其他金額',
        'claim_photo'       => '出險車照',
        'claim_reason'      => '出險原因',
        'claim_place'       => '出險地點',
        'creator'           => '建立人',
        'createDate'        => '建立時間',
        'updDate'           => '最後更新時間',
    ],
    'insuranceMail'=>[
        'insurance_uuid'    => '保單系統編號',
        'mail_type'         => '信件類型',
        'mail_date'         => '寄件時間',
        'mail_title'        => '信件主旨',
        'mail_sender'       => '信件寄件人',
    ],
    'endorsement'=>[
        'id'                => '批單系統編號',
        'parent_id'         => '前一批單系統編號',
        'serial_number'     => '批單號碼',
        'isSurrender'       => '是否為退保批單',
        'startDate'         => '批單效期起日',
        'endDate'           => '批單效期迄日',
        'total_premium'     => '批單總保費',
        'vol_premium'       => '批單總保費',
        'tf_premium'        => '批單任意險保費',
        'cps_premium'       => '批單強制險保費',
        'car_premium'       => '批單車體險保費',
        'theft_premium'     => '批單竊盜險保費',
        'third_person_premium' => '批單第三人保費',
        'created_at'        => '建立時間',
        'updated_at'        => '最後更新時間',
    ],
    'endorsementItem'=>[
        'id'                => '保險項目系統編號',
        'endorsement_id'    => '批單系統編號',
        'insurance_item_id' => '保險項目',
        'item_person_price' => '批註自負額',
        'item_price_1'      => '批註保額一',
        'item_price_2'      => '批註保額二',
        'item_fee'          => '批註保費',
        'item_fee_result'   => '保費小計'
    ],
    'commission'=>[
        'id'                        => '保險佣金系統編號',
        'insurance_uuid'            => '所屬保單系統編號',
        'endorsement_id'            => '所屬批單系統編號',
        'bonus_id'                  => '所屬獎金系統編號',
        'surrender_id'              => '退保紀錄系統編號',
        'company_vol_pct'           => '保險公司 任意險應收%',
        'company_vol_pct_rp'        => '保險公司 任意險退保實退%',
        'company_vol_ar'            => '保險公司 任意險應收',
        'company_vol_rp'            => '保險公司 任意險退保實退',
        'company_tf_pct'            => '保險公司 颱洪險應收%',
        'company_tf_pct_rp'         => '保險公司 颱洪險退保實退%',
        'company_tf_ar'             => '保險公司 颱洪險應收',
        'company_tf_rp'             => '保險公司 颱洪險退保實退',
        'company_cps_ar'            => '保險公司 強制險應收',
        'company_cps_rp'            => '保險公司 強制險退保實退',
        'company_total_ar'          => '保險公司 總應收',
        'company_total_ap'          => '保險公司 總實收',
        'company_receipt_date'      => '保險公司 實收日',
        'company_total_rr'          => '保險公司 總退保應退',
        'company_total_rp'          => '保險公司 總退保實退',
        'company_pay_date'          => '保險公司 退保實退日',
        'company_note1'             => '保險公司 備註一',
        'company_note2'             => '保險公司 備註二',
        'source_company_vol_pct'    => '通路公司 任意險應發%',
        'source_company_vol_pct_rp' => '通路公司 任意險退保實收%',
        'source_company_vol_ar'     => '通路公司 任意險應發',
        'source_company_vol_rp'     => '通路公司 任意險退保實收',
        'source_company_tf_pct'     => '通路公司 颱洪險應發%',
        'source_company_tf_pct_rp'  => '通路公司 颱洪險退保實收%',
        'source_company_tf_ar'      => '通路公司 颱洪險應發',
        'source_company_tf_rp'      => '通路公司 颱洪險退保實收',
        'source_company_cps_ar'     => '通路公司 強制險應發',
        'source_company_cps_rp'     => '通路公司 強制險退保實收',
        'source_company_total_ar'   => '通路公司 總應發',
        'source_company_total_ap'   => '保險公司 總實發',
        'source_company_pay_date'   => '通路公司 實發日',
        'source_company_total_rp'   => '通路公司 總退保實收',
        'source_company_receipt_date' => '通路公司 退保實收日',
        'sale_vol_pct'              => '業代 任意險應發%',
        'sale_vol_pct_rp'           => '業代 任意險退保實收%',
        'sale_vol_ar'               => '業代 任意險應發',
        'sale_vol_rp'               => '業代 任意險退保實收',
        'sale_tf_pct'               => '業代 颱洪險應發%',
        'sale_tf_pct_rp'            => '業代 颱洪險退保實收%',
        'sale_tf_ar'                => '業代 颱洪險應發',
        'sale_tf_rp'                => '業代 颱洪險實退',
        'sale_cps_ar'               => '業代 強制險應發',
        'sale_cps_rp'               => '業代 強制險實退',
        'sale_total_ar'             => '業代 總應發',
        'sale_total_ap'             => '業代 總應發',
        'sale_pay_date'             => '業代 實發日',
        'sale_total_rp'             => '業代 總實退',
        'sale_receipt_date'         => '業代 退保實收日',
        'is_lock'                   => '是否已由會計鎖定',
        'manual_pct_updated_webuser'=> '手動變更人員',
        'manual_pct_updated_at'     => '手動變更時間'
    ],
    'customer'=>[
        'id'                => '客戶流水號',
        'customer_uuid'     => '客戶系統編號',
        'customer_name'     => '姓名/公司',
        'customer_title'    => '尊稱',
        'customer_id'       => '身分證字號/統編',
        'customer_birth'    => '生日',
        'customer_note'     => '貼心注意事項',
        'customer_photo'    => '個人照片',
        'contact_type'      => '常用聯絡方式',
        'contact_content'   => '常用聯絡方式-其他',
        'home_city'         => '住家縣市',
        'home_dist'         => '住家鄉鎮市區',
        'home_zipcode'      => '住家郵遞區號',
        'home_addr'         => '住家詳細地址',
        'home_tel'          => '聯絡電話(室內)',
        'mobile_tel'        => '聯絡電話(手機)',
        'customer_email'    => '電子郵件',
        'work_name'         => '公司名稱',
        'work_city'         => '公司縣市',
        'work_dist'         => '公司鄉鎮市區',
        'work_zipcode'      => '公司郵遞區號',
        'work_addr'         => '公司詳細地址',
        'work_tel'          => '公司電話',
        'work_fax'          => '公司傳真',
        'job_title'         => '職稱',
        'tax_id'            => '統編',
        'old_db_data1'      => '舊系統資料表1',
    ],
    'customerCar'=>[
        'car_id'            => '車籍序號',
        'car_uuid'          => '車籍系統編號',
        'car_eng_id'        => '引擎代碼',
        'car_body_id'       => '車身代碼',
        'customer_uuid'     => '客戶編號',
        'car_plate_number'  => '牌照號碼',
        'licenseDate'       => '原發照日期',
        'car_year'          => '出廠年份',
        'car_code8'         => '車型代碼',
        'car_brand'         => '廠牌',
        'car_model'         => '車型',
        'car_price'         => '重置價格',
        'car_type'          => '車輛種類',
        'car_eng_disp'      => '排氣量',
        'car_file'          => '車輛檔案',
        'is_changed'        => '是否更改牌照號碼',
        'change_json'       => '車牌更改紀錄',
        'transfer'          => '是否過戶',
        'transfer_from'     => '轉移前的車籍編號',
    ],
    'customerContact'=>[
        'contact_id'        => '聯絡人系統編號',
        'customer_uuid'     => '客戶系統編號',
        'contact_name'      => '聯絡人姓名',
        'contact_relation'  => '聯絡人關係',
        'contact_relation_other' => '其他內容/業代內容',
        'contactBirthDate'  => '聯絡人出生日期',
        'contact_tel'       => '聯絡電話(室內)',
        'contact_mobile_tel'=> '聯絡號碼(手機)',
        'contact_fax'       => '聯絡人傳真電話',
        'contact_email'     => '聯絡人Email',
        'contact_city'      => '聯絡人縣市',
        'contact_dist'      => '聯絡人鄉鎮市區',
        'contact_zipcode'   => '聯絡人郵遞區號',
        'contact_address'   => '聯絡人詳細地址',
    ],
    'customerVisit'=>[
        'visit_id'          => '拜訪紀錄編號',
        'customer_uuid'     => '客戶',
        'visit_date'        => '拜訪日期',
        'record_content'    => '事項',
        'record_user'       => '紀錄人員',
    ],
    'company'=>[
        'company_id'        => '保險公司編號',
        'company_type'      => '保險公司代碼',
        'company_name'      => '保險公司名稱',
        'company_ip'        => '保險公司連入IP',
        'vol_pct'           => '任意險佣金趴數',
        'tf_pct'            => '颱洪險佣金趴數',
        'cps'               => '汽車強制險佣金',
        'mps_one_year'      => '機車一年期強制險佣金',
        'mps_two_year'      => '機車二年期強制險佣金',
    ],
    'companyMail'=>[
        'company_email_id'  => '保險公司信件流水號',
        'company_id'        => '保險公司編號',
        'email_name'        => '信箱',
        'name'              => '信箱名稱',
    ],
    'source'=>[
        'source_id'         => '客戶來源流水號',
        'source_type'       => '客戶來源代碼',
        'source_name'       => '客戶來源名稱',
    ],
    'sourceCompany'=>[
        'source_company_id' => '通路流水號',
        'source_type'       => '客戶來源',
        'company_type'      => '通路代碼',
        'company_name'      => '通路名稱',
        'vol_pct'           => '任意險佣金趴數',
        'tf_pct'            => '颱洪險佣金趴數',
        'cps'               => '強制險佣金',
    ],
    

];