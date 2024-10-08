<?php 

namespace App\Services;

class JunipayService
{
    public function momoprompt($amount, $network, $msisdn, $client_id)
    {
        // Preparing the payload for the request
        $payload = [
            "amount" => doubleval($amount),
            "tot_amnt" => doubleval($amount),
            "provider" => strtolower($network),
            "phoneNumber" => $msisdn,
            "channel" => 'mobile_money',
            "senderEmail" => 'sabsolinfo@gmail.com',
            "description" => 'SAB-TECH HUB PAYMENTS',
            "foreignID" => $client_id,
            "callbackUrl" => 'https://webhook.site/8068a52e-b8e0-4a20-a144-14ed4c7bb384'
        ];

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.junipayments.com/payment',
            CURLOPT_SSL_VERIFYPEER => 0, // Set to true for production
            CURLOPT_RETURNTRANSFER => false, // Do not wait for the response
            CURLOPT_TIMEOUT_MS => 1000, // Timeout immediately after sending the request
            CURLOPT_POST => true, // Ensure it is a POST request
            CURLOPT_POSTFIELDS => json_encode($payload), // Sending payload
            CURLOPT_HTTPHEADER => [
                'clientid: Qys10304',
                'Content-Type: application/json',
                'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXlsb2FkIjoiIiwiaWF0IjoxNjY1MDkzMjQxfQ.pRFO8MCG06NkeXJ9mCefTi90yMKLu8tdiEUvLlxiWl4WkgfygXwCdrqs5aywDOwAL_7QQXv5Mul7_ASBZS25g-klBUBUMi6yw4HPw6SBLv-Q0ktoSCjIRWlL3N9-V-bHhndn1qAD2wU4HShhtFhT8gxoaNj5IvWv_upEdRMky2f6Ky6P_rZuv5wVMn_9QjfDeGuRnPcvrbwXO0k_1kGGhYBjozeOyWARhUUjwIAjIBH5u1SQATSpFEs20p308NeUeumiluaMve8MsVORP_bAVDkKM2ZMVvH609AUDrVmns-sFqoiwx9tl-nztfq8n_VJyaVmJQ3uJDSDQ1LKFWT3kicyJBl-Cg4QzFt0DggEu0WyWPWp311CBohLxp6A58bSuNkg5wwCP_Rfa_0Vh2PsJvZpYiLoGhTU1YnjCcspRiBAC6ijAcMfmdDbwRWvzSUzFmjXFFlJqxImbvetPI_kqunNQGHFVEfe9DgDWZAWfneReW4rJ5xPivEe28J0qJteDcqDgu9sET9n4oTmHmXfqlwpIz4ciPxhPdx2fWFAUomE0MSrG_n_wnHTlCqHtvc-xDJOSiSiwKkwGp7XfsgmPwtTb9DY0OwSKdgwY8s0ZJEUkUQ6TG66emZJPdxL4uH7g_fN2gJJuhUKBrIHiFeHjSs_gz5yID-7ewBlzOxq1X0',
            ]
        ]);

        // Execute the cURL request
        curl_exec($curl);

        // Close the cURL session
        curl_close($curl);
    }
}