package com.mock.bodyguards.dto.training;

import com.mock.bodyguards.dto.image.ImageResponse;
import io.swagger.v3.oas.annotations.media.Schema;
import jakarta.validation.constraints.NotEmpty;
import jakarta.validation.constraints.NotNull;
import lombok.Data;

import java.time.LocalDateTime;
import java.util.List;

@Data
@Schema(
        name = "BodyguardTrainingRequest",
        description = "Schema to hold bodyguard training information"
)
public class BodyguardTrainingResponse {

    @Schema(
            name = "bodyguardId",
            description = "ID of the bodyguard",
            type = "Long",
            example = "1"
    )
    @NotNull(message = "Bodyguard ID cannot be null")
    private Long bodyguardId;

    @Schema(
            name = "trainingCatalogId",
            description = "ID of the training catalog",
            type = "Long",
            example = "1"
    )
    @NotNull(message = "Training Catalog ID cannot be null")
    private Long trainingCatalogId;

    @Schema(
            name = "images",
            description = "List of images associated with the bodyguard training",
            type = "List<ImageRequest>"
    )
    private List<ImageResponse> images;

    @Schema(
            name = "status",
            description = "Status of the training",
            type = "String",
            example = "in progress"
    )
    @NotEmpty(message = "Status cannot be empty")
    private String status;

    @Schema(
            name = "description",
            description = "Description of the training",
            type = "String",
            example = "Training is currently ongoing."
    )
    private String description;

    @Schema(
            name = "startDay",
            description = "Start date and time of the training",
            type = "LocalDateTime",
            example = "2024-08-15T09:00:00"
    )
    private LocalDateTime startDay;

    @Schema(
            name = "endDay",
            description = "End date and time of the training",
            type = "LocalDateTime",
            example = "2024-08-20T17:00:00"
    )
    private LocalDateTime endDay;

    @Schema(
            name = "createdAt",
            description = "Created time of the example",
            type = "String",
            example = "2023-01-01T00:00:00"
    )
    private LocalDateTime createdAt;

    @Schema(
            name = "updatedAt",
            description = "Updated time of the example",
            type = "String",
            example = "2023-01-01T00:00:00"
    )
    private LocalDateTime updatedAt;
}
