<html>
	<head>
	</head>
    <body>
        <div role="main">
            <div style="border: 1px solid #E6E9ED; background: #fff; padding: 20px;">
                <div>
                    <section>
                        <div>
                            <div>
                                <div style="border-top: 1px solid #e5e5e5; height: 1px; margin: 20px 0px ;color: #ffffff;"></div>
                                <table style="background-color: #fff;width: 100%; max-width: 100%;margin-bottom: 20px;border-collapse: collapse;border-collapse: collapse; text-align:left;color: #73879C;">
                                    <thead>
                                        <tr>
                                            <th style="min-width:80px;border-bottom: 2px solid #ddd; padding: 8px; float: none;width: 17%; min-width:80px;">項目</th>
                                            <th style="min-width:80px;border-bottom: 2px solid #ddd; padding: 8px; float: none;">內容</th>
                                        </tr>
                                    </thead>
                                    <tbody style="max-width: 100%;">
                                        <tr>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">姓名</td>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">{!! $formData->name !!}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">連絡電話</td>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">{!! $formData->phone !!}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">E-mail</td>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">{!! $formData->email !!}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">內容</td>
                                            <td style="padding: 8px; border-top: 1px solid #ddd; color: #73879C; background: #f9f9f9;">{!! $formData->content !!}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>