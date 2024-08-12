package com.mock.bodyguards.dto.training;

import io.swagger.v3.oas.annotations.media.Schema;
import jakarta.validation.constraints.NotEmpty;
import jakarta.validation.constraints.NotNull;
import lombok.Data;

import java.time.LocalDateTime;

@Data
@Schema(
        name = "TrainingCatalogRequest",
        description = "Schema to hold training catalog information"
)
public class TrainingCatalogRequest {

    @Schema(
            name = "name",
            description = "Name of the training",
            type = "String",
            example = "Self-defense Techniques"
    )
    @NotEmpty(message = "Name cannot be empty")
    private String name;

    @Schema(
            name = "duration",
            description = "Duration of the training",
            type = "LocalDateTime",
            example = "2024-08-12T10:15:30"
    )
    @NotNull(message = "Duration cannot be null")
    private LocalDateTime duration;

    @Schema(
            name = "description",
            description = "Description of the training",
            type = "String",
            example = "A comprehensive course on self-defense techniques."
    )
    private String description;

    @Schema(
            name = "startAt",
            description = "Start date and time of the training",
            type = "LocalDateTime",
            example = "2024-08-15T09:00:00"
    )
    @NotNull(message = "Start date cannot be null")
    private LocalDateTime startAt;

    @Schema(
            name = "endAt",
            description = "End date and time of the training",
            type = "LocalDateTime",
            example = "2024-08-20T17:00:00"
    )
    @NotNull(message = "End date cannot be null")
    private LocalDateTime endAt;
}