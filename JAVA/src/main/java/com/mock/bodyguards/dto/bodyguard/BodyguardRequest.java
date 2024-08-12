package com.mock.bodyguards.dto.bodyguard;

import io.swagger.v3.oas.annotations.media.Schema;
import jakarta.validation.constraints.NotNull;
import lombok.Data;

@Data
@Schema(
        name = "BodyguardRequest",
        description = "Schema to hold bodyguard information"
)
public class BodyguardRequest {

    @Schema(
            name = "timeSheetsId",
            description = "TimeSheets ID of the bodyguard",
            type = "Integer",
            example = "1"
    )
    @NotNull(message = "TimeSheets ID cannot be null")
    private Integer timeSheetsId;

    @Schema(
            name = "userId",
            description = "User ID associated with the bodyguard",
            type = "Integer",
            example = "2"
    )
    @NotNull(message = "User ID cannot be null")
    private Integer userId;

    @Schema(
            name = "jobId",
            description = "Job ID associated with the bodyguard",
            type = "Integer",
            example = "3"
    )
    @NotNull(message = "Job ID cannot be null")
    private Integer jobId;

    @Schema(
            name = "serviceId",
            description = "Service ID associated with the bodyguard",
            type = "Integer",
            example = "4"
    )
    @NotNull(message = "Service ID cannot be null")
    private Integer serviceId;
}
