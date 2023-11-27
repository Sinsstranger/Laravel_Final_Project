<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/payment.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection

    <div class="container-xl px-4 mt-4">
        <div class="card card-header-actions mb-4">
            <div class="card-header" style="display: flex; justify-content: space-between;">
                Методы оплаты
                <button class="btn btn-sm btn-primary" type="button">Добавить метод оплаты</button>
            </div>
            <div class="card-body px-0">
                <!-- Payment method 1-->
                <div class="d-flex align-items-center justify-content-between px-4" style="margin-bottom: 12px">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                        <div class="ms-4">
                            <div class="small">Visa ending in 1234</div>
                            <div class="text-xs text-muted">Expires 04/2024</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <div class="badge bg-light text-dark me-3">По умолчанию</div>
                        <a href="#!">Изменить</a>
                    </div>
                </div>
                <hr>
                <!-- Payment method 2-->
                <div class="d-flex align-items-center justify-content-between px-4" style="margin-bottom: 12px">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-mastercard fa-2x cc-color-mastercard"></i>
                        <div class="ms-4">
                            <div class="small">Mastercard ending in 5678</div>
                            <div class="text-xs text-muted">Expires 05/2022</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <a class="text-muted me-3" href="#!">Сделать по умолчанию</a>
                        <a href="#!">Изменить</a>
                    </div>
                </div>
                <hr>
                <!-- Payment method 3-->
                <div class="d-flex align-items-center justify-content-between px-4" style="margin-top: 12px">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                        <div class="ms-4">
                            <div class="small">American Express ending in 9012</div>
                            <div class="text-xs text-muted">Expires 01/2026</div>
                        </div>
                    </div>
                    <div class="ms-4 small">
                        <a class="text-muted me-3" href="#!">Сделать по умолчанию</a>
                        <a href="#!">Изменить</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Billing history card-->
        <div class="card mb-4">
            <div class="card-header">История платежей</div>
            <div class="card-body p-0">
                <!-- Billing history table-->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr style="text-align: left">
                                <th class="border-gray-200" scope="col">ID Транзакции</th>
                                <th class="border-gray-200" scope="col">Дата</th>
                                <th class="border-gray-200" scope="col">Сумма</th>
                                <th class="border-gray-200" scope="col">Статус</th>
                            </tr>
                        </thead>
                        <tbody style="">
                            <tr>
                                <td>#39201</td>
                                <td>06/15/2021</td>
                                <td>$29.99</td>
                                <td><span class="badge bg-light text-dark">В ожидании</span></td>
                            <tr>
                                <td>#38594</td>
                                <td>05/15/2021</td>
                                <td>₽29.99</td>
                                <td><span class="badge bg-success">Оплачено</span></td>
                            </tr>
                            <tr>
                                <td>#38223</td>
                                <td>04/15/2021</td>
                                <td>$29.99</td>
                                <td><span class="badge bg-success">Оплачено</span></td>
                            </tr>
                            <tr>
                                <td>#38125</td>
                                <td>03/15/2021</td>
                                <td>$29.99</td>
                                <td><span class="badge bg-success">Оплачено</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>