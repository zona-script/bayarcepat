@if ($transaction->type == \App\Enums\TransactionEnum::$typeProduct || $transaction->type == \App\Enums\TransactionEnum::$typeMarket)
    <div class="box">
        <div class="field">
            <h3 class="title is-4">Update Transaksi</h3>
            <table class="table table-bordered is-fullwidth">
                <thead>
                <th>No</th>
                <th>Waktu</th>
                <th>Status</th>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>Transaksi dimulai</td>
                </tr>

                @foreach($transaction->callbackResponse as $response)
                    <tr>
                        <td>{{ ($loop->iteration + 1) }}</td>
                        <td>{{ $response->created_at }}</td>
                        <td>{{ transaction_status_to_str($response->status) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
