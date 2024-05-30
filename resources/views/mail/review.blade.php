<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td style="padding: 20px 0;">
            <table align="center" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto;">
                <tr>
                    <td align="center">
                        <a href="#" style="display: block; margin-bottom: 20px;">
                            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="Логотип"
                                 style="max-width: 200px; height: auto; border: 0;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="15" cellpadding="0"
                               style="background-color: #fff; border-radius: 10px; padding: 20px;">
                            <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="padding-right: 10px; font-weight: bold;">Кому адресовано
                                                сообщение:
                                            </td>
                                            <td>{{ $name }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-right: 10px; font-weight: bold;">Телефон для связи:
                                            </td>
                                            <td>{{ $phone }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding-bottom: 10px;">{{ $text }}</td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
