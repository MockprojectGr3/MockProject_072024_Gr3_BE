package com.mock.bodyguards.controller;

import com.mock.bodyguards.dto.ErrorResponse;
import com.mock.bodyguards.dto.SuccessResponse;
import com.mock.bodyguards.dto.training.BodyguardTrainingResponse;
import com.mock.bodyguards.entity.BodyguardTraining;
import com.mock.bodyguards.service.ITrainingService;
import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.media.Content;
import io.swagger.v3.oas.annotations.media.Schema;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.responses.ApiResponses;
import io.swagger.v3.oas.annotations.tags.Tag;
import lombok.RequiredArgsConstructor;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.time.LocalDateTime;
import java.util.List;

@Tag(
        name = "Training",
        description = "Training API"
)
@RestController
@RequestMapping("/api/v1/training")
@Validated
@RequiredArgsConstructor
public class TrainingController {

    private final ITrainingService trainingService;

    @Operation(
            summary = "Get ongoing training",
            description = "Get ongoing training"
    )
    @ApiResponses({
            @ApiResponse(
                    responseCode = "200",
                    description = "Ongoing training",
                    content = @Content(
                            mediaType = "application/json",
                            schema = @Schema(
                                    implementation = BodyguardTrainingResponse.class
                            )
                    )
            ),
            @ApiResponse(
                    responseCode = "400",
                    description = "Bad request",
                    content = @Content(
                            mediaType = "application/json",
                            schema = @Schema(
                                    implementation = ErrorResponse.class
                            )
                    )
            )
    })
    @GetMapping("/{bodyguardId}/ongoing")
    public ResponseEntity<SuccessResponse> getOnGoingTraining(@PathVariable Long bodyguardId) {
        List<BodyguardTraining> trainings = trainingService.getOngoingTraining(bodyguardId);
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(SuccessResponse.builder()
                        .timestamp(LocalDateTime.now())
                        .statusCode(HttpStatus.OK)
                        .statusMessage("Ongoing training")
                        .data(trainings)
                        .build());
    }
}
