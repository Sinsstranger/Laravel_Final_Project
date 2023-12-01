<x-app-layout>
    @section('style')
    @parent
    <link rel="stylesheet" href="{{ asset("assets/css/cabinet.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/payment.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/addPayment.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("assets/js/addPayment.js") }}"></script>
    @endsection

    <div class="container-xl px-4 mt-4">
        <div class="card card-header-actions mb-4">
            <div class="card-header" style="display: flex; justify-content: space-between;">
                Методы оплаты
                <button class="btn btn-sm btn-primary" type="button" id="addPaymentMethodBtn">Добавить метод оплаты</button>
            </div>
            {{-- Скрытая форма для добавления метода оплаты --}}
            <div id="addPaymentMethodForm" style="display: none;">
                <form id="paymentMethodForm">
                    <div class="main">
                        <div class="container">
                            <svg id="exit" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.35288 8.95043C4.00437 6.17301 6.17301 4.00437 8.95043 3.35288C10.9563 2.88237 13.0437 2.88237 15.0496 3.35288C17.827 4.00437 19.9956 6.17301 20.6471 8.95044C21.1176 10.9563 21.1176 13.0437 20.6471 15.0496C19.9956 17.827 17.827 19.9956 15.0496 20.6471C13.0437 21.1176 10.9563 21.1176 8.95044 20.6471C6.17301 19.9956 4.00437 17.827 3.35288 15.0496C2.88237 13.0437 2.88237 10.9563 3.35288 8.95043Z" stroke="#1B1B1B" stroke-width="1.5"></path>
                        <path d="M13.7678 10.2322L10.2322 13.7678M13.7678 13.7678L10.2322 10.2322" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round"></path></svg>
                        
                        <div class="heading">
                          <h1>Детали оплаты</h1>
                        </div>
                          <br>
                          <label for="name">Имя</label>
                            <input type="text" id="name" name="name" placeholder="Name">
                          <br>
                          <label for="card">Номер карты</label>
                            <input type="text" minlength="16" maxlength="16" id="card" name="card" placeholder="0000 0000 0000 0000">
                          <br>
                          <div class="exp-cvc">
                            <div class="expiration">
                          <label for="expiry">Срок действия</label>
                            <input class="inputCard" name="expiry" id="expiry" type="text" required="" placeholder="00/00">
                            <br>
                            </div>
                            <div class="security">
                          <label for="cvc">CVC</label>
                            <input type="text" minlength="3" maxlength="4" id="cvc" name="cvc" placeholder="XXX">
                          <br>
                            </div>
                        </div>
                        <div class="btn">
                            <span id="submit">Подтвердить</span>
                        </div>
                    </div>
                    </div>
                        <div class="save_canel">
                            <button type="submit" class="btn btn-sm btn-success" style="color: rgb(0, 0, 0)" >Сохранить</button>
                            <button type="button" id="cancelPaymentMethodBtn" class="btn btn-sm btn-secondary">Отмена</button>
                        </div>
                </form>
                <br>
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
                        <tbody class="t-body">
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