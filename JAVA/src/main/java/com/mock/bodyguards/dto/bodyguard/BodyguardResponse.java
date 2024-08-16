package com.mock.bodyguards.dto.bodyguard;

import io.swagger.v3.oas.annotations.media.Schema;
import lombok.Data;

import java.time.LocalDateTime;

@Data
@Schema(
        name = "BodyguardResponse",
        description = "Schema to hold bodyguard information"
)
public class BodyguardResponse {

    @Schema(
            name = "timeSheetsId",
            description = "TimeSheets ID of the bodyguard",
            type = "Integer",
            example = "1"
    )
    private Integer timeSheetsId;

    @Schema(
            name = "userId",
            description = "User ID associated with the bodyguard",
            type = "Integer",
            example = "2"
    )
    private Integer userId;

    @Schema(
            name = "jobId",
            description = "Job ID associated with the bodyguard",
            type = "Integer",
            example = "3"
    )
    private Integer jobId;

    @Schema(
            name = "serviceId",
            description = "Service ID associated with the bodyguard",
            type = "Integer",
            example = "4"
    )
    private Integer serviceId;

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
