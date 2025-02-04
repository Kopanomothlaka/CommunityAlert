package com.example.servicealert.api;

import com.example.servicealert.Alert;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;

public interface ApiService {
    @GET("alerts") // Ensure this matches the API endpoint
    Call<List<Alert>> getAlerts();
}