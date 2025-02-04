package com.example.servicealert;

import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.example.servicealert.api.ApiService;
import com.example.servicealert.api.RetrofitClient;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {
    private static final String TAG = "MainActivity";
    private TextView alertsTextView;  // TextView to display alerts

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Initialize TextView
        alertsTextView = findViewById(R.id.alertsTextView);

        // Get the ApiService instance
        ApiService apiService = RetrofitClient.getApiService();

        // Fetch alerts from the API
        Call<List<Alert>> call = apiService.getAlerts();
        call.enqueue(new Callback<List<Alert>>() {
            @Override
            public void onResponse(@NonNull Call<List<Alert>> call, @NonNull Response<List<Alert>> response) {
                if (response.isSuccessful()) {
                    List<Alert> alerts = response.body();
                    if (alerts != null && !alerts.isEmpty()) {
                        StringBuilder alertText = new StringBuilder();
                        for (Alert alert : alerts) {
                            alertText.append("⚠️ ").append(alert.getTitle()).append(": ").append(alert.getMessage()).append("\n\n");
                        }
                        alertsTextView.setText(alertText.toString());
                    } else {
                        alertsTextView.setText("No alerts found.");
                    }
                } else {
                    Log.e(TAG, "Failed to fetch alerts: " + response.code() + " " + response.message());
                    alertsTextView.setText("Failed to fetch alerts: " + response.message());
                }
            }

            @Override
            public void onFailure(@NonNull Call<List<Alert>> call, @NonNull Throwable t) {
                Log.e(TAG, "Network error: " + t.getMessage(), t);
                alertsTextView.setText("Network error: " + t.getMessage());
            }
        });
    }
}
