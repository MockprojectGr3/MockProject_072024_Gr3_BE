package com.mock.bodyguards.dto.response.example;

import io.swagger.v3.oas.annotations.media.Schema;
import lombok.Data;

import java.time.LocalDateTime;

@Data
@Schema(
    name = "ExampleDto",
    description = "Schema to hold example dto information"
)
public class ExampleResponse {

    @Schema(
        name = "id",
        description = "Id of the example",
        type = "Long",
        example = "1"
    )
    private Long id;

    @Schema(
        name = "name",
        description = "Name of the example",
        type = "String",
        example = "VietDoan"
    )
    private String name;

    @Schema(
        name = "email",
        description = "Email of the example",
        type = "String",
        example = "doantv.dev@gmail"
    )
    private String email;

    @Schema(
        name = "mobileNumber",
        description = "Mobile number of the example",
        type = "String",
        example = "0123456789"
    )
    private String mobileNumber;

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
